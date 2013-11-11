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

	public function showAdvancedForm() {

		$data = FormController::createDropdown();

		$data['brands'] =array('All Brands'=>'All brands')+$data['brands']; 
		$data['state'] =array('All States'=>'All States')+$data['state']; 
		$data['usage'] =array('All Usages'=>'All Usages')+$data['usage']; 

	
		return View::make('embeds/advanced', $data);

	}

	public function getAdvancedSearch() {
		
		// var_dump(Input::get());

		$price_min 		= Input::get('min');
		$price_max 		= Input::get('max');
		$brand 			= Input::get('brand');
		$color			= Input::get('color');
		$year 			= Input::get('year');
		$usage 			= Input::get('usage');
		$state 			= Input::get('state');

		if($brand == 'All Brands')
			$brand = '*';

		if($state == 'All States')
			$state = '*';

		if($usage == 'All Usages')
			$usage = '*';


		$phones = Phone::whereBetween('price',	array($price_min, $price_max))
					  ->orWhere('brand', 	'=', 	$brand)
					  ->orWhere('color', 	'=', 	$color)
					  ->orWhere('year',	'=', 	$year)
					  ->orWhere('usage',	'=',	$usage)
					  ->orWhere('state',	'=',	$state)
					  ->get();

		return $phones->tojson();
		
	}

	public function byLocation() {
		return View::make('embeds/location');
	}



}