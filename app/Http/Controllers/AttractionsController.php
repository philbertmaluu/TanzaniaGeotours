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

    public function destroy(Shop $shop)
    {
        //abort_if(Gate::denies('shop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->delete();

        return back();
    }

}
