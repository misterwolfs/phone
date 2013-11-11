<?php

class PhoneController extends BaseController {

	public function showIndex()
	{

		$data = array();

		if(Auth::check()) {
			$data = Auth::user();

			$id = Auth::user()->userID;

			$myphone = Phone::where('users.userID', '=', $id)
						->join('users_has_phones', 'phones.phoneID', '=', 'users_has_phones.phoneID')
			            ->join('users', 'users.userID', '=', 'users_has_phones.userID')
			            ->first(array('phones.phoneID'));

			if($myphone == NULL)
			{
				$myphone = 'no-phone';
			}

			$data = array_add($data, 'phone', $myphone);  
		}
		
		


		return View::make('master', array('data' =>$data));
	}

	public function showForm()
	{
		
		return View::make('embeds/sidebar/form');
	}	

	public function addPhone()
	{	
		$phone =  new Phone;


		$phone::create(array(
			'model' 		=> 		Input::get('model'),
			'brand' 		=> 		Input::get('brand'),
			'year' 			=> 		Input::get('year'),
			'usage' 		=> 		Input::get('usage'),
			'state' 		=> 		Input::get('state'),
			'price' 		=> 		Input::get('price'),
			'description' 	=> 		Input::get('description'),
			'lat'			=>		Input::get('lat'),
			'long'			=>		Input::get('long'),
			'color' 		=> 		Input::get('color')
		));


		

		$phoneID = Phone::orderBy('phoneID', 'DESC')->pluck('phoneID');
		$imageID = Images::orderBy('imageID', 'DESC')->pluck('imageID');
		$userID = Auth::user()->userID;
		
		$phone->user()->attach(1, array('userID' => $userID, 'phoneID' => $phoneID, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')));
		//$phone->images()->attach(1, array('imageID' => $imageID, 'phoneID' => $phoneID, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')));


		return Redirect::to('/')->with('message', 'Succesfully added');
	}

	public function viewPhone() 
	{
		$phones = Phone::all();

		

		foreach ($phones as $phone)
		{
		    var_dump($phone->model);
		    var_dump($phone->brand); 
		    echo '<br />';
		}

 		View::make('phones', $data);
	}


	public function getInfo($id) {

		$phones = Phone::where('phones.phoneID', '=', $id)
					->join('users_has_phones', 'phones.phoneID', '=', 'users_has_phones.phoneID')
		            ->join('users', 'users.userID', '=', 'users_has_phones.userID')
		            // ->join('phones_has_images', 'phones.phoneID', '=', 'phones_has_images.phoneID')
		            // ->join('images', 'images.imageID', '=', 'phones_has_images.imageID')
		            ->first();

		
		$phones = $phones->toArray();

		return View::make('embeds/sidebar/phone-view', $phones);
	}
	

	public function getMyPhone() {

		$data = array();

		$userID = Auth::user()->userID;

		$myphone = Phone::where('users.userID', '=', $userID)
					->join('users_has_phones', 'phones.phoneID', '=', 'users_has_phones.phoneID')
		            ->join('users', 'users.userID', '=', 'users_has_phones.userID')
		            ->get();
		
		
		$myphone = $myphone->toArray();            

	

		if($myphone)
		{
			
			$myphone = $myphone;

			$data = array_add($data, 'phones', $myphone);
			$data = array_add($data, 'phone', ''); 
				
		}
		else {

			
			$myphone = 'no-phone';

			$data = array_add($data, 'phone', $myphone);  
		}
	


		return View::make('embeds/sidebar/my-phone', $data);
		
	}

	public function deleteMyPhone() {

		$userID = Auth::user()->userID;

		$phone = Phone::where('users.userID', '=', $userID)
					->join('users_has_phones', 'phones.phoneID', '=', 'users_has_phones.phoneID')
		            ->join('users', 'users.userID', '=', 'users_has_phones.userID')
		            ->first();

		$phone = $phone->toArray();

		$phoneID = $phone['phoneID'];

		Phone::where('phones.phoneID', '=', $phoneID)
		             ->delete();

		UserHasPhone::where('users_has_phones.phoneID', '=', $phoneID)
		             ->delete();

		return $phoneID;             

	}
	

	

}