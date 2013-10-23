<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

			// $table->increments('userID');
			// $table->string('fistname');
			// $table->string('lastname');
			// $table->string('adress');
			// $table->integer('age');
			// $table->string('email');
			// $table->string('facebook');
			// $table->string('twitter');
			// $table->integer('is_repairder');
			// $table->timestamps();

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
		Schema::drop('users');
	}

}