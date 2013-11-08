<?php

class UserController extends BaseController {

	public function userInfo() {
		$id = Auth::user()->userID;

		$user = User::find($id);

		$repairder = RepairLocation::where('userID', '=', $id)->get();

		$data = array();

		$data = array_add($data, 'user', $user);
		$data = array_add($data, 'repairder', $repairder);

		return View::make('embeds/sidebar/userform', $data);
	}

	public function userEdit() {

		$id = Auth::user()->userID;

		$user = User::find($id);

		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->email = Input::get('email');

		$repairder = Input::get('repairder');

		if($repairder == null)
		{
			$user->is_repairder = 0;
		}
		else {
			$user->is_repairder = 1;
		}

		$user->save();

		$repairder =  new RepairLocation;

		$lat = Input::get('lat');
		$long = Input::get('long');

		$location = $lat . ', ' . $long;

		$repairder->userID = $id;
		$repairder->location = $location;
		
		$repairder->save();

		return Redirect::to('/')->with('message', 'successfully updated');
	}

	
}