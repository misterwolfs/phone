<?php

class PhoneController extends BaseController {

	public function showIndex()
	{

		$data = array();

		if(Auth::check()) {
			$data = Auth::user();
		}
		

		return View::make('master', array('data' =>$data));
	}

	public function showForm()
	{
		return View::make('sidebar/sidebar_form');
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
		$userID = Auth::user()->userID;
		
	
		
		$phone->user()->attach(1, array('userID' => $userID, 'phoneID' => $phoneID, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')));

		// return Redirect::to('/')->with('message', 'Succesfully added');
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

 //View::make('phones', $data);
	}

	

	

	

}