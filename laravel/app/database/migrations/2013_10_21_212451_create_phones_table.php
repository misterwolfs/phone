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
			$table->string('state');
			$table->double('price');
			$table->text('description');
			$table->string('color');
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
		Schema::drop('phones');
	}

}