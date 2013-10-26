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

Route::get('/', 'PhoneController@showIndex');

//Route::get('/phone/add', 'MainController@showForm');

Route::group(array('prefix' => 'phone'), function() {
	Route::post('add', array('as' => 'add_phone', 'uses' => 'PhoneController@addPhone'));

	Route::get('all', array('as' => 'all_phones', 'uses' => 'PhoneController@viewPhone'));
});

Route::group(array('prefix' => 'embeds'), function() {
	Route::get('form', array('as' => 'get_form', 'uses' => 'FormController@showForm'));
});

/* AJAX REQUESTS */
Route::get('form', function() {
	return View::make('embeds/form');
});

/* AJAX POSTS */
Route::post('addphone', 'PhoneController@addPhone');


Route::group(array('prefix' => 'login'), function() {

	Route::group(array('prefix' => 'fb'), function() {
		Route::get('/', 'FacebookController@facebookLogin');

		Route::get('/callback', 'FacebookController@facebookCallback');
	});		
});


Route::group(array('prefix' => 'user'), function() {
	Route::get('info', 'UserController@userInfo');

	Route::post('edit', 'UserController@userEdit');
});


Route::get('logout', 'FacebookController@userLogout');

