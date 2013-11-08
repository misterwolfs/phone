<?php

class MainController extends BaseController {

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
		return View::make('embeds/sidebar/form');
	}	

	public function addPhone()
	{	

		// $id = Auth::user()->id;

		// $userID = User::find($id)->id;

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

		//$user = new UserHasPhone;

		// $user::create(array(
		// 	'userID' 		=> 		$userID,
		// 	'phoneID'		=>		$phone->id
		// ));
		
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