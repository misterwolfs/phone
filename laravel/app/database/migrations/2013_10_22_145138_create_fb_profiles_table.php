<?php

use Illuminate\Database\Migrations\Migration;

class CreateFbProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facebook_profiles', function($table) {
			$table->increments('id');
			$table->integer('facebook_user_id')->unsigned();
			$table->string('username');
			$table->biginteger('uid')->unsigned();
			$table->string('access_token');
			$table->string('acces_token_secret');
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
		Schema::drop('facebook_profiles');
	}

}