<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ShopsController;


// Home route
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.shops.index')->with('status', session('status'));
    }
    return redirect()->route('admin.shops.index');
});

// Public routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('shop/{shop}', 'HomeController@show')->name('shop');

// Authentication routes
Auth::routes();

// Shops resource route

Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/attractions', 'AttractionsController@index')->name('attractions');
Route::get('/attractions/create', 'AttractionsController@create')->name('attractions.create');
Route::post('/attractions/store', 'AttractionsController@store')->name('attractions.store');
Route::delete('shops/destroy', 'AttractionsController@massDestroy')->name('shops.massDestroy');
Route::delete('/attractions/{shop}', 'AttractionsController@destroy')->name('attractions.destroy');



 
//  // Shops
//  Route::delete('shops/destroy', 'ShopsController@massDestroy')->name('shops.massDestroy');
//  Route::post('shops/media', 'ShopsController@storeMedia')->name('shops.storeMedia');
//  Route::resource('shops', 'ShopsController');


// Admin routes with authentication and middleware
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Shops
    Route::delete('shops/destroy', 'ShopsController@massDestroy')->name('shops.massDestroy');
    Route::post('shops/media', 'ShopsController@storeMedia')->name('shops.storeMedia');
    Route::resource('shops', 'ShopsController');
});
