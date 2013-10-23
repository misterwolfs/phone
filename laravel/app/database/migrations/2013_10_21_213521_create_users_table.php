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

			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('adress');
			$table->integer('age');
			$table->string('photo');
			$table->string('email');
			$table->string('facebook');
			$table->integer('is_repairder');
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