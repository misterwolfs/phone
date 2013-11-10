<?php

class FormController extends BaseController {

	public function showForm()
	{
		$data = FormController::createDropdown();

		return View::make('embeds/sidebar/form', $data);
	}

	public static function Year_Array() {
		$year = array();

		for($i = date('Y'); $i >= 1990; $i--)
		{
			$year[$i] = $i;
		}	

		return $year;

	}

	public static function State_Array() {
		$state = array(
			'broken' => 'broken',
			'some scratches' => 'some scratched',
			'need to be repaired' => 'need to be repaired',
			'as good as new' => 'as good as new',
			'new' => 'new'
		);
		
		return $state;

	}

	public static function Usage_Array() {
		$usage = array(
			'used a lot' => 'used a lot',
			'used' => 'used',
			'used a couple of times' => 'used a couple of times',
			'just out of the box' => 'just out of the box',
			'in the box' => 'in the box'
		);

		return $usage;

	}

	public static function Brand_Array() {
		$brands = Brand::orderBy('brand', 'asc')->get()->toArray();

		$dataArray = array();
		
		

		foreach ($brands as $brand)
		{	
			$id = $brand['brand'];
			$name = $brand['brand'];

			$dataArray = array_add($dataArray, $id, $name);	
		}

		return $dataArray;
	}

	public static function createDropdown() {
		$data = array();
		
		$year = FormController::Year_Array();
		$state = FormController::State_Array();
		$usage = FormController::Usage_Array();
		$brand = FormController::Brand_Array();


		$data = array_add($data, 'allyears', $year);
		$data = array_add($data, 'brands', $brand);
		$data = array_add($data, 'state', $state);
		$data = array_add($data, 'usage', $usage);

		return $data;
	}
}