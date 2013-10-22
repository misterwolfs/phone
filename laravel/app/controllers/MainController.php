<?php

class MainController extends BaseController {

	public function showIndex()
	{
		return View::make('master');
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
			'stage' 		=> 		Input::get('stage'),
			'price' 		=> 		Input::get('price'),
			'description' 	=> 		Input::get('description'),
			'color' 		=> 		Input::get('color')
		));

		// Session::flash('succes_phone', 'Succesfully added');
		// return Redirect::to('embeds/form');
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