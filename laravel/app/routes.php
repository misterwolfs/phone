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

Route::get('/phone/add', 'MainController@showForm');

Route::group(array('prefix' => 'phone'), function() {
	Route::post('add', array('as' => 'add_phone', 'uses' => 'MainController@addPhone'));

	Route::get('all', array('as' => 'all_phones', 'uses' => 'MainController@viewPhone'));
});

Route::group(array('prefix' => 'embeds'), function() {
	Route::get('form', array('as' => 'get_form', 'uses' => 'FormController@showForm'));
});

/* AJAX REQUESTS */
Route::get('form', function() {
	return View::make('embeds/form');
});
