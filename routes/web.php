<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/item', function () {
    return view('item.index',[
        'items' => Item::all()
    ]);
});

Route::get('/item/delete/{id}','App\Http\Controllers\ItemController@destroy');

Route::get('/item/edit/{id}','App\Http\Controllers\ItemController@edit');



Route::get('/item/search','App\Http\Controllers\ItemController@search');

Route::get('/item/add',function(){
    return view('item.add');
});

// Route::post('/item/{id}','App\Http\Controllers\ItemController@store');
Route::post('/item/{item}/edit','App\Http\Controllers\ItemController@update');


Route::get('/buy',function(){
    return view('buy.index',[
        "items" => Item::all()
    ]);
});

Route::post('/item',[ItemController::class,'store']);

Route::get('/retrive',);

