<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function($table) {

			$table->increments('phoneID');
			$table->string('model');
			$table->string('brand');
			$table->integer('year');
			$table->string('usage');
			$table->string('stage');
			$table->double('price');
			$table->text('description');
			$table->string('color');
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
		Schema::drop('phones');
	}

}