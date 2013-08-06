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
	return Redirect::to('incidents');
});

Route::resource('incidents', 'IncidentsController');

Route::resource('documents', 'DocumentsController');

//Route::controller( 'user', 'UserController');

Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');


Route::get( 'incidents/create',            'IncidentsController@create');
Route::post('incidents',                   'IncidentsController@store');
Route::get( 'incidents/show',              'IncidentsController@show');
Route::post('incidents/edit',              'IncidentsController@edit');
Route::post('incidents/update',            'IncidentsController@update');
Route::get('incidents/get_add',            'IncidentsController@get_add');
Route::post('incidents/add',            'IncidentsController@add');
Route::get('incidents/get_add1',         'IncidentsController@get_add1');
Route::post('incidents/add1',            'IncidentsController@add1');
Route::get('incidents/get_add2',         'IncidentsController@get_add2');
Route::post('incidents/add2',            'IncidentsController@add2');
//Route::get('incidents/test/{id}',         'IncidentsController@getpdf'); //to call custom function
Route::get('incidents/get_edit2',            'IncidentsController@get_edit2');
Route::post('incidents/{id}/edit2',            'IncidentsController@edit2');
Route::get('incidents/get_edit3',            'IncidentsController@get_edit3');
Route::post('incidents/{id}/edit3',            'IncidentsController@edit3');
Route::get('incidents/get_edit4',            'IncidentsController@get_edit4');
Route::post('incidents/{id}/edit4',            'IncidentsController@edit4');

//Route::get('incidents/',         'IncidentsController@update1');
//Route::get('incidents/getStep1',         'IncidentsController@getStep1');
//Route::post('incidents/postStep1',            'IncidentsController@postStep1');
//Route::post('incidents/test/postStep1',            'IncidentsController@postStep1');
Route::get( 'incidents/getpdf/{id}',     'IncidentsController@getpdf');
Route::get('incidents/email/{id}',         'IncidentsController@generatemail'); //to call custom function


Route::resource('search', 'SearchController');

Route::get('/setup', function()
{
	$admin = new Role;
	$admin->name = 'Admin';
	$admin->permissions = array('create_incident', 'edit_incident', 'view_incident', 'review_incident', 'signoff_incident', 'close_incident');
	$admin->save();

	$viewOnly = new Role;
	$viewOnly->name = 'ViewOnly';
	$viewOnly->permissions = array('view_incident');
	$viewOnly->save();

	$creator = new Role;
	$creator->name = 'Creator';
	$creator->permissions = array('create_incident', 'edit_incident', 'view_incident');
	$creator->save();

	$reviewer = new Role;
	$reviewer->name = 'Reviewer';
	$reviewer->permissions = array('review_incident');
	$reviewer->save();

	$risk = new Role;
	$risk->name = 'Risk';

	$risk->permissions = array('create_incident', 'edit_incident', 'view_incident', 'review_incident', 'signoff_incident', 'close_incident');
	$risk->save();

	$user = User::find(1);
 	$user->attachRole($admin);

	$user = User::find(2);
	$user->attachRole($creator);

	$user = User::find(3);
	$user->attachRole($creator);

	$user = User::find(4);
	$user->attachRole($creator);
});
