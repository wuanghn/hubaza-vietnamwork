<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('author','BlogController@index');
Route::post('store_author','BlogController@store');
Route::get('delete_author','BlogController@destroy');
Route::post('update_author','BlogController@update');

Route::get('article','ArticleController@index');




// ROUTE BY WA 31/3/2015
Route::controller('users', 'UsersController');


