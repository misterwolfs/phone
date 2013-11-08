<?php

use Illuminate\Database\Migrations\Migration;

class AddPhones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('phones')->insert(array(
			'model' => 'iPhone 5S',
			'brand' => 'Apple',
			'year' => '2013',
			'usage' => 'Good',
			'state' => 'Brand new',
			'price' => '800',
			'description' => 'Brand new iPhone 5S Space Gray. 32GB.',
			'color' => 'SpaceGray',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s'),
			'lat' => '51.24',
			'long' => '4.41799',
		));

		DB::table('phones')->insert(array(
			'model' => 'iPhone 3GS',
			'brand' => 'Apple',
			'year' => '2008',
			'usage' => 'Used',
			'state' => 'Slow, old',
			'price' => '150',
			'description' => 'Used iPhone 3GS. Good for repair!',
			'color' => 'Black',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s'),
			'lat' => '51.214266',
			'long' => '4.44',
		));

		DB::table('phones')->insert(array(
			'model' => 'Galaxy S4',
			'brand' => 'Samsung',
			'year' => '2012',
			'usage' => 'Good',
			'state' => 'Used',
			'price' => '600',
			'description' => 'Still 1 year garuantee',
			'color' => 'White',
			'created_at' => date('Y-m-d H:m:s'),
			'lat' => '51.214265',
			'long' => '4.51798',
		));

		DB::table('phones')->insert(array(
			'model' => '3310',
			'brand' => 'Nokia',
			'year' => '2000',
			'usage' => 'Good',
			'state' => 'Used',
			'price' => '20',
			'description' => 'Best cellphone ever!',
			'color' => 'blue',
			'created_at' => date('Y-m-d H:m:s'),
			'lat' => '51.914250',
			'long' => '4.41780',
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('phones')->delete();
	}

}