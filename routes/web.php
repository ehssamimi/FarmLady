<?php

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
//    return view('welcome');
//    return view('adminPanel.layOut.categories.create-categories');
    return view('adminPanel.layOut.dashBoard.Dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('administrator')->group(  function () {

    Route::Resource('photo','admin\PhotoController');
    Route::post('photo/upload', 'admin\PhotoController@upload')->name("photo.upload");


    Route::Resource('category','admin\CategoryController');
    Route::Resource('product','admin\ProductController');
    Route::Resource('attribute','admin\AttributeController');
 });

