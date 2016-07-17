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

Route::get('/admin', function(){

	return view('admin.index');
});
// created Admin middleware and put all admin work inside
Route::group(['middleware'=>'admin'], function(){

	Route::resource('/admin/users', 'AdminUserController');
	Route::resource('/admin/posts','PostController');
	Route::resource('/admin/categories', 'CategoryController');
});

Route::resource('/tweets','TweetController');