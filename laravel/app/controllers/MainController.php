<?php

class MainController extends BaseController {

	public function showIndex()
	{
		return View::make('rephone');
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

		Session::flash('succes_phone', 'Succesfully added');
		return Redirect::to('embeds/form');
	}
}