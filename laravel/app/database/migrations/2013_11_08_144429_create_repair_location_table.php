<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepairLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_locations', function($table) {

			$table->increments('repairderID');
			$table->integer('userID');
			$table->string('location');
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
		Schema::drop('repair_locations');	}

}
