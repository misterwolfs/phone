<?php

class FormController extends BaseController {

	public function showForm()
	{
		$brands = Brand::all()->toArray();

		$dataArray = array();
		$data = array();

		foreach ($brands as $brand)
		{	
			$id = $brand['brandID'];
			$name = $brand['brand'];

			$dataArray = array_add($dataArray, $id, $name);	
		}

		$data = array_add($data, 'brands', $dataArray);

		return View::make('embeds/form', $data);
	}

}