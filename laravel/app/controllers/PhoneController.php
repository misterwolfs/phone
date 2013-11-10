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
		
		return View::make('embeds/sidebar/form');
	}	

	public function addPhone()
	{	
		$phone =  new Phone;
		// $images = new Images;

		// $file = Input::file('image');
		
		
		

		// $type = $file->getMimeType();
		// $size = $file->getSize();
		// $error_message = 'Something went wrong while uploading your file, please try again';

		
		// if($type == 'image/jpg' || $type == 'image/png' || $type == 'image/gif' || $type == 'image/jpeg') 
		// {
		// 	if($size < 4000000)
		// 	{
		// 		$filename  = date("Ymd") . '_' . date("His")  . '_' . $file->getClientOriginalName();
		// 		$image = Image::make($file->getRealPath())->resize(110, 110)->save('storage/uploaded/' . $filename);

				

		// 		$images->name = $filename;
		// 		$images->save();
		// 	}
		// 	else {
		// 		echo $error_message;
		// 	}
		// }
		// else {
		// 	echo $error_message;
		// }


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

		// var_dump($phones->toArray());
		$phones = $phones->toArray();

		return View::make('embeds/sidebar/phone-view', $phones);
	}
	

	

	

}