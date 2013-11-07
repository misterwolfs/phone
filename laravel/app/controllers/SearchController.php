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

		return View::make('embeds/brand', $data);
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
		
		// print_r($phonessss->toJSON());

		return $phones->tojson();
		
		//return View::make('embeds/search/brand', $phones);
	}
}