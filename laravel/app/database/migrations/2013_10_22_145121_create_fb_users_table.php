<?php

use Illuminate\Database\Migrations\Migration;

class CreateFbUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facebook_users', function($table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('photo');
			$table->string('name');
			$table->string('password');
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
		Schema::drop('facebook_users');
	}

}