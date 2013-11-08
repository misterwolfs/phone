<?php

class FormController extends BaseController {

	public function showForm()
	{
		$brands = Brand::orderBy('brand', 'asc')->get()->toArray();

		$dataArray = array();
		$data = array();

		foreach ($brands as $brand)
		{	
			$id = $brand['brand'];
			$name = $brand['brand'];

			$dataArray = array_add($dataArray, $id, $name);	
		}

		$data = array_add($data, 'brands', $dataArray);

		return View::make('embeds/sidebar/form', $data);
	}

}