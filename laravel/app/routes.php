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

Route::get('/', 'MainController@showIndex');

Route::group(array('prefix' => 'phone'), function() {

	Route::get('add', 'MainController@addPhone');

});

Route::group(array('prefix' => 'embeds'), function() {

	Route::get('form', function() {
		return View::make('embeds/form');
	});

});

