<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersHasPhoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_has_phones', function($table) {

			$table->increments('users_has_phonesID');
			$table->integer('userID');
			$table->integer('phoneID');
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
		Schema::drop('users_has_phones');
	}

}