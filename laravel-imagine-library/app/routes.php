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
	//return View::make('hello');
	return Redirect::to('images');
});

Route::get('images', array('as'=>'images', 'uses'=>'ImagesController@getIndex'));
Route::get('image/{id}', array('as'=>'image', 'uses'=>'ImagesController@getView'))->where('id', '[0-9]+');
Route::get('image/new', array('as'=>'new_image', 'uses'=>'ImagesController@getNew'));
Route::post('images/create', array('uses'=>'ImagesController@postCreate'));