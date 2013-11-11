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
			$table->string('lat');
			$table->string('long');
			$table->timestamps();
			$table->softDeletes();
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
