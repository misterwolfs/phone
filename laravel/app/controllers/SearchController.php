<?php

class SearchController extends BaseController {

	public function showBrands() {
		$brands = Brand::all()->toArray();

		echo '<pre>';
		print_r($brands);
		echo '</pre>';
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