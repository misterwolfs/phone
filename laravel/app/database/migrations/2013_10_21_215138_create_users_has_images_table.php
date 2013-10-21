<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersHasImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_has_images', function($table) {

			$table->increments('users_has_imagesID');
			$table->integer('userID');
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
		Schema::drop('users_has_images');
	}

}