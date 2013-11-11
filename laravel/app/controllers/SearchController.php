<?php

class SearchController extends BaseController {

	public function showBrands() {
		
		$phone = Phone::orderBy('brand', 'asc')->distinct()->get(array('brand'))->toArray();
	
		$dataArray = array();
		$firstLetters = array();
		$data = array();
		$i = 0;

		foreach ($phone as $brand)
		{	
			//$id = $brand['brandID'];
			$name = $brand['brand'];
			
			if(!in_array($name[0], $firstLetters)) {
			    $firstLetters = array_add($firstLetters, $i , $name[0]);
			   
			}

			 $i++;

			$dataArray = array_add($dataArray, $i, $name);
			
		}

		 $data = array_add($data, 'brands', $dataArray);
		 $data = array_add($data, 'firstLetters', $firstLetters);



		return View::make('embeds/sidebar/brand', $data);
	}

	public function searchAll()
	{
		$phones = Phone::all();

		return $phones->tojson();
	}

	public function searchByBrand($brand) {
		$phones = Phone::where('brand', '=', $brand)->get();


		if($phones->isEmpty())
		{
			$phones = "";
		}
		
		// print_r($phones->toArray());


		// $phonessss = array (
		// 	'phoneID' => $phones['0']['phoneID'], 
		// 	'model' => 'test'
		// );

		return $phones->tojson();
		
		//return View::make('embeds/search/brand', $phones);
	}


	public function allCafes() {
		$cafes = Repaircafe::all(array('cafeID','lat', 'long'));

		return $cafes->tojson();

	}

	public function showCafe($cafeID) {
		$cafes = Repaircafe::where('cafeID', '=', $cafeID)->first();

		return View::make('embeds/sidebar/repair-cafe', $cafes);
	}


	public function allRepairders() {
		$users = User::where('is_repairder', '=', '1')
					->whereNull('repair_locations.deleted_at')
					->join('repair_locations', 'users.userID', '=', 'repair_locations.userID')
					->get();

		return $users->tojson();

	}

	public function showRepairder($userID) {
		$users = User::where('users.userID', '=', $userID)
				->whereNull('repair_locations.deleted_at')
				->join('repair_locations', 'users.userID', '=', 'repair_locations.userID')
				->first();

						
		return View::make('embeds/sidebar/repairder', $users->toArray());
	}




	

	public function showAdvancedForm() {

		$data = FormController::createDropdown();

		$colors = Phone::distinct()->lists('color');

		$colorArray = array();
		//var_dump($colors);

		foreach ($colors as $color)
		{	
			 $colorArray = array_add($colorArray, $color, $color);	
		}

		
		$data = array_add($data, 'colors', $colorArray);
		
		$data['colors'] =array('All Colors'=>'All Colors')+$data['colors']; 
		$data['allyears'] =array('All Years'=>'All Years')+$data['allyears']; 
		$data['brands'] =array('All Brands'=>'All Brands')+$data['brands']; 
		$data['state'] =array('All States'=>'All States')+$data['state']; 
		$data['usage'] =array('All Usages'=>'All Usages')+$data['usage']; 

	
		return View::make('embeds/advanced', $data);

	}

	public function getAdvancedSearch() {
		
		// var_dump(Input::get());

		$price_min 		= intval(Input::get('min'));
		$price_max 		= intval(Input::get('max'));
		$brand 			= Input::get('brand');
		$color			= Input::get('color');
		$year 			= Input::get('year');
		$usage 			= Input::get('usage');
		$state 			= Input::get('state');
		$flexible 		= Input::get('flexible');

		
		if($flexible)
		{
			$phones = Phone::whereBetween('price',	array($price_min, $price_max));

				if($color != 'All Colors' ) { 	$phones->orWhere('color', 	'=', 	$color); 	} 
				if($brand != 'All Brands' ) { 	$phones->orWhere('brand', 	'=', 	$brand); 	} 
				if($year  != 'All Years'  ) { 	$phones->orWhere('year', 	'=', 	$year); 	} 
				if($usage != 'All Usages' ) { 	$phones->orWhere('usage', 	'=', 	$usage); 	} 
				if($state != 'All States' ) { 	$phones->orWhere('state', 	'=', 	$state); 	} 

				$phones = $phones->get();

			
		}
		else 
		{
			$phones = Phone::whereBetween('price',	array($price_min, $price_max));

				if($color != 'All Colors' ) { 	$phones->where('color', 	'=', 	$color); 	} 
				if($brand != 'All Brands' ) { 	$phones->where('brand', 	'=', 	$brand); 	} 
				if($year  != 'All Years'  ) { 	$phones->where('year', 		'=', 	$year); 	} 
				if($usage != 'All Usages' ) { 	$phones->where('usage', 	'=', 	$usage); 	} 
				if($state != 'All States' ) { 	$phones->where('state', 	'=', 	$state); 	} 

				$phones = $phones->get();
		}

		
		return $phones->tojson();
		
	}

	public function byLocation() {
		return View::make('embeds/location');
	}



}