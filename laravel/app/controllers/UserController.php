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

		echo $repairder;

		if($repairder == null)
		{
			$user->is_repairder = 0;

			$repair = RepairLocation::where('userID', '=', $id)->delete();
		}
		else {
			$user->is_repairder = 1;

			
				

			$lat = Input::get('lat');
			$long = Input::get('long');

			

			if($lat != ' ' || $long != ' ')
			{	
				$repairder =  new RepairLocation;
				$repairder->userID = $id;
				$repairder->lat = $lat;
				$repairder->long = $long;
				
				$repairder->save();
			}
		}

		$user->save();

		

		//return Redirect::to('/')->with('message', 'successfully updated');
	}

	
}