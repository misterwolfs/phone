<?php

use Illuminate\Database\Migrations\Migration;

class AddUsersPhones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users_has_phones')->insert(array(
			'userID' => '1',
			'phoneID' => '1',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('users_has_phones')->insert(array(
			'userID' => '1',
			'phoneID' => '2',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('users_has_phones')->insert(array(
			'userID' => '2',
			'phoneID' => '3',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('users_has_phones')->insert(array(
			'userID' => '1',
			'phoneID' => '4',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('users_has_phones')->delete();
	}

}