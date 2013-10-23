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

/* AJAX POSTS */
Route::post('addphone', 'MainController@addPhone');


Route::group(array('prefix' => 'login'), function() {

	Route::group(array('prefix' => 'fb'), function() {
		Route::get('/', function() {
			$facebook = new Facebook(Config::get('facebook'));
			$params = array(
				'redirect_uri'  => url('/login/fb/callback'),
				'scope' => 'email',
			);
			return Redirect::to($facebook->getLoginUrl($params));
		});

		Route::get('/callback', function() {
		    $code = Input::get('code');
		    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
		    
		    $facebook = new Facebook(Config::get('facebook'));
		    $uid = $facebook->getUser();
		     
		    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
		     
		    $me = $facebook->api('/me');

			$profile = Profile::whereUid($uid)->first();
		    if (empty($profile)) {

		    	$user = new User;
		    	$user->name = $me['first_name'].' '.$me['last_name'];

		    	if(isset($me['email']))
		    	{
		    		$user->email = $me['email'];
		    	}
		    	else {
		    		$user->email = "false";
		    	}
		    	$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
		    	

		    	

		  

		        $user->save();

		        $profile = new Profile();
		        $profile->uid = $uid;
		    	$profile->username = $me['username'];
		    	$profile = $user->profiles()->save($profile);
		    }
		     
		    $profile->access_token = $facebook->getAccessToken();
		    $profile->save();

		    $user = $profile->user;
		 
		    
		    Auth::login($user);
		     
		    return Redirect::to('/');

		});
	});		
});

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');
});