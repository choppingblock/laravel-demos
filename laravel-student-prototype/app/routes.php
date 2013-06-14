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
	// return View::make('hello');
	return Redirect::to('students');
});

Route::get('students', array('as'=>'students', 'uses'=>'StudentsController@getIndex'));
Route::get('student/{id}', array('as'=>'student', 'uses'=>'StudentsController@getView'))->where('id', '[0-9]+');
Route::get('student/new', array('as'=>'new_student', 'uses'=>'StudentsController@getNew'));
Route::post('students/create', array('uses'=>'StudentsController@postCreate'));
Route::get('student/{id}/edit', array('as'=>'edit_student', 'uses'=>'StudentsController@getEdit'));
Route::put('student/update', array('uses'=>'StudentsController@putUpdate'));
Route::delete('student/delete', array('uses'=>'StudentsController@deleteDestroy'));

Route::get('years', array('as'=>'years', 'uses'=>'YearsController@getIndex'));
Route::get('year/{id}', array('as'=>'year', 'uses'=>'YearsController@getView'))->where('id', '[0-9]+');
Route::get('year/new', array('as'=>'new_year', 'uses'=>'YearsController@getNew'));
Route::post('years/create', array('uses'=>'YearsController@postCreate'));

Route::get('skills', array('as'=>'skills', 'uses'=>'SkillsController@getIndex'));
Route::get('skill/{id}', array('as'=>'skill', 'uses'=>'SkillsController@getView'))->where('id', '[0-9]+');
Route::get('skill/new', array('as'=>'new_skill', 'uses'=>'SkillsController@getNew'));
Route::post('skills/create', array('uses'=>'SkillsController@postCreate'));
