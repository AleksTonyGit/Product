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
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/createP', array('as' => 'create_product_type_form','uses' => 'Product_typeController@getForm'));
Route::post('/createPro', array('as' => 'create_product_type','uses' => 'Product_typeController@postCreate'));


Route::get('/createC', array('as' => 'create_category_form','uses' => 'CategoryController@getForm'));
Route::post('/createCat', array('as' => 'create_category','uses' => 'CategoryController@postCreate'));

Route::get('/create', array('as' => 'create','uses' => 'ProductController@create'));
Route::post('/create', 'ProductController@store');

Route::post('/search','ProductController@search');

Route::get('/index', array('as' => 'show','uses' => 'ProductController@showProduct'));

Route::get('/deleteproduct/{id}', array('as' => 'delete_product','uses' => 'ProductController@getDelete'));

Route::post('/index', 'Product_typeController@store');

Route::get('product/{id}/edit', array('as' => 'product.edit','uses' => 'ProductController@edit'));
Route::post('product/{id}', array('as'=>'product.update','uses'=>'ProductController@update'));
