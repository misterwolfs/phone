<?php

class UserController extends BaseController {

	public function userInfo() {
		$id = Auth::user()->userID;

		$user = User::find($id);

		

		return View::make('embeds/userform', $user);
	}

	public function userEdit() {
		$user = User::find(1);

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

		return Redirect::to('/')->with('message', 'successfully updated');
	}
}