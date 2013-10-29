<?php

use Illuminate\Database\Migrations\Migration;

class AddBrands extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('brands')->insert(array(
			'brand' => 'Apple',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Amazon',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Asus',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Acer',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Blackberry',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'HTC',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Huwaei',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'LG',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Nokia',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Samsung',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));

		DB::table('brands')->insert(array(
			'brand' => 'Sony',
			//'created_at' => date('Y-m-d H:m:s'),
			//'updated_at' => date('Y-m-d H:m:s'),
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('brands')->delete();
	}

}