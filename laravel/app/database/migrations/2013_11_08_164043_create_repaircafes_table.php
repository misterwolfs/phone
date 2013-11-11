<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepaircafesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repaircafes', function($table) {
			$table->increments('cafeID');
			$table->string('name');
			$table->string('adress');
			$table->string('postalcode');
			$table->string('village');
			$table->string('lat');
			$table->string('long');
			$table->string('website');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repaircafes');
	}

}