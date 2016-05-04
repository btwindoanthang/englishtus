<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin','name'=>'admin','middleware' => ['web']], function () {
    
    Route::get('/','Admin\AdminController@index');

    Route::get('/category','Admin\Category\CategoryController@index');

    Route::get('/add',function(){
    	return view('admin/category/add');
    });

    Route::post('/addcategory',['uses' => 'Admin\Category\CategoryController@add']);
});
