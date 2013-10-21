<?php

class MainController extends BaseController {

	public function showIndex()
	{
		return View::make('rephone');
	}

}