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
    $data['title'] = 'Home Page';
    return view('home', $data);
})->name('/');

Route::get('/admin', function () {
    $data['title'] = 'Admin Page';
    return view('admin', $data);
})->name('admin');

Route::get('/admin/item', function () {
    return view('item.index', [
        "title" => "Data Item",
        "items" => Item::all(),
    ]);
})->name('admin.item');

Route::get('/item/delete/{id}', 'App\Http\Controllers\ItemController@destroy')
    ->name('item.delete');

Route::get('/item/edit/{id}', 'App\Http\Controllers\ItemController@edit')
    ->name('item.edit');



Route::get('/item/search', 'App\Http\Controllers\ItemController@search')
    ->name('item.search');

Route::get('/item/add', function () {
    return view('item.add');
})->name('item.add');


Route::post('/item/{item}/edit', 'App\Http\Controllers\ItemController@update')
    ->name('item.item.edit');


Route::get('/buy', function () {
    $data['title'] = 'Buy';
    return view('buy.index', [
        "items" => Item::all(),
        "title" => $data['title'],
    ]);
})->name('buy');

Route::post('/item', [ItemController::class, 'store'])
    ->name('item');

// Route::get('/retrive',);
