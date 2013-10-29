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
			'state' 		=> 		Input::get('stage'),
			'price' 		=> 		Input::get('price'),
			'description' 	=> 		Input::get('description'),
			'lat'			=>		Input::get('lat'),
			'long'			=>		Input::get('long'),
			'color' 		=> 		Input::get('color')
		));
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