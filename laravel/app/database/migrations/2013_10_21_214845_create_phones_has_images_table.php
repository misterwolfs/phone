<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhonesHasImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones_has_images', function($table) {

			$table->increments('phones_has_imagesID');
			$table->integer('phoneID');
			$table->integer('imageID');
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
		Schema::drop('phones_has_images');
	}

}