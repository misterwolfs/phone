<?php

class FacebookController extends BaseController {

	public function facebookLogin() {

		$facebook = new Facebook(Config::get('facebook'));
		
		$params = array(
			'redirect_uri'  => url('/login/fb/callback'),
			'scope' => 'email',
		);

		return Redirect::to($facebook->getLoginUrl($params));
	}

	public function facebookCallback() {
		$code = Input::get('code');
		    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'error');
		    
		    $facebook = new Facebook(Config::get('facebook'));
		    $uid = $facebook->getUser();
		     
		    if ($uid == 0) return Redirect::to('/')->with('message', 'error');
		     
		    $me = $facebook->api('/me');

		    

			$profile = Profile::whereUid($uid)->first();
		    if (empty($profile)) {

		    	$user = new User;
		    	$user->firstname = $me['first_name'];
		    	$user->lastname = $me['last_name'];

		    	
		    	if(isset($me['email']))
		    	{
		    		$user->email = $me['email'];
		    	}
		    	else {
		    		$user->email = "";
		    	}
		    	$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
		    	$user->facebook = $me['link'];

		  

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
	}

	public function userLogout() {
		Auth::logout();
		return Redirect::to('/');
	}

}