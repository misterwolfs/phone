<?php

class SearchController extends BaseController {

	public function showBrands() {
		
		$brands = Brand::orderBy('brand', 'asc')->get()->toArray();
		$dataArray = array();
		$firstLetters = array();
		$data = array();
		$i = 0;

		foreach ($brands as $brand)
		{	
			$id = $brand['brandID'];
			$name = $brand['brand'];
			

			if(!in_array($name[0], $firstLetters)) {
			    $firstLetters = array_add($firstLetters, $i , $name[0]);
			    $i++;
			}

			

			$dataArray = array_add($dataArray, $id, $name);
			
		}


	

		$data = array_add($data, 'brands', $dataArray);
		$data = array_add($data, 'firstLetters', $firstLetters);

		return View::make('embeds/brand', $data);
	}

	public function searchAll()
	{
		$phones = Phone::all()->toJSON();

		echo '<pre>';
		print_r($phones);
		echo '</pre>';
	}

	public function searchByBrand($brand) {
		$phones = Phone::where('brand', '=', $brand)->get();


		if($phones->isEmpty())
		{
			$phones = Phone::all();
		}
		
		echo '<pre>';
		print_r($phones->toJSON());
		echo '</pre>';
		

	}
}