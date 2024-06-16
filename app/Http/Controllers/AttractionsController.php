<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Day;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyShopRequest;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Shop;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AttractionsController extends Controller
{
    public function  index(){

        //abort_if(Gate::denies('shop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shops = Shop::all();

        //abort_if(Gate::denies('shop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all()->pluck('name', 'id');
        $days = Day::all();
       
        return view('admin.attractions.index', compact('shops','categories', 'days'));
    }

    public function create(){
        $categories = Category::all()->pluck('name', 'id');
        $days = Day::all();

        return view('admin.attractions.create', compact('categories', 'days'));
    }

    public function store(StoreShopRequest $request)
    {

        //dd($request);
        $shop = Shop::create($request->all());
        $shop->categories()->sync($request->input('categories', []));

        $hours = collect($request->input('from_hours'))->mapWithKeys(function ($value, $id) use ($request) {
            return $value ? [
                $id => [
                    'from_hours'    => $value,
                    'from_minutes'  => $request->input('from_minutes.' . $id),
                    'to_hours'      => $request->input('to_hours.' . $id),
                    'to_minutes'    => $request->input('to_minutes.' . $id)
                ]
            ]
                : [];
        });
        $shop->days()->sync($hours);

        foreach ($request->input('photos', []) as $file) {
            $shop->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        return redirect()->back()->with('success', 'Attraction created successfull');
    }


    public function edit(Shop $shop)
    {
        //abort_if(Gate::denies('shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');
        $days = Day::all();

        $shop->load('categories', 'created_by', 'days');

        return view('admin.attractions.edit', compact('categories', 'shop', 'days'));
    }

    public function show(Shop $shop)
    {
        //abort_if(Gate::denies('shop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $days = Day::all();
        $shop->load('categories', 'created_by');

        return view('admin.attractions.show', compact('shop', 'days'));
    }

    //update

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        // Debugging the request
        // dd($request->all());
    
        // Ensure 'active' field is set to 0 if not present in the request
        if (!$request->has('active')) {
            $request->merge([
                'active' => 0
            ]);
        }
    
        // Update the shop with the request data
        $shop->update($request->all());
    
        // Sync the categories
        $shop->categories()->sync($request->input('categories', []));
    
        // Prepare working hours data
        $hours = collect($request->input('from_hours'))->mapWithKeys(function ($value, $id) use ($request) {
            return $value ? [
                $id => [
                    'from_hours'    => $value,
                    'from_minutes'  => $request->input('from_minutes.' . $id),
                    'to_hours'      => $request->input('to_hours.' . $id),
                    'to_minutes'    => $request->input('to_minutes.' . $id)
                ]
            ] : [];
        });
    
        // Sync the working hours
        $shop->days()->sync($hours);
    
        // Handle photos
        if ($shop->photos->isNotEmpty()) {
            foreach ($shop->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
    
        // Add new photos
        $existingMedia = $shop->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (!in_array($file, $existingMedia)) {
                $shop->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }
    
        // Redirect to the attractions show route
        return redirect()->back()->with('success', 'Attractiion updated  successfully');
    }

    public function destroy(Shop $shop)
    {
        //abort_if(Gate::denies('shop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->delete();

        return back();
    }

   
    public function showcase(Shop $shop)
    {
        $shop->load(['categories', 'days']);

        return view('guest.show', compact('shop'));
    }

}
