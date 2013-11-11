<?php

use Illuminate\Database\Migrations\Migration;

class AddRepaircafes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('repaircafes')->insert(array(
			'name' => 'Ecohuis',
			'adress' => 'Turnhoutsebaan 139',
			'postalcode' => '2140',
			'village' => 'Antwerpen (Dam)',
			'lat' => '51.218282',
			'long' => '4.450418',
			'website' => 'http://ecohuis.antwerpen.be',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Elegast',
			'adress' => 'Twee Netenstraat 13a',
			'postalcode' => '2060',
			'village' => 'Borgerhout',
			'lat' => '51.232429',
			'long' => '4.428413',
			'website' => 'http://www.elegast.be',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Krankhoeve',
			'adress' => 'Grote Doelstraat 1',
			'postalcode' => '2820',
			'village' => 'Bonheiden',
			'lat' => '51.027806',
			'long' => '4.551752',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Ter Dilft',
			'adress' => 'Sint-Amandsesteenweg 41-43',
			'postalcode' => '2880',
			'village' => 'Bornem',
			'lat' => '51.0946337',
			'long' => '4.2317024',
			'website' => 'http://www.terdilft.be',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Jeugdhuis Josto',
			'adress' => 'Herrystraat 22',
			'postalcode' => '2120',
			'village' => 'Deurne',
			'lat' => '51.2091683',
			'long' => '4.4534356',
			'website' => 'http://www.transitiedeurne.be/repaircafe',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Repair Café Ekeren',
			'adress' => 'Kloosterstraat 50',
			'postalcode' => '2180',
			'village' => 'Ekeren',
			'lat' => '51.2812493',
			'long' => '4.4180772',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Kringwinkel zuiderkempen',
			'adress' => 'Noordstraat 25',
			'postalcode' => '2220',
			'village' => 'Heist-op-den-Berg',
			'lat' => '51.0797432',
			'long' => '4.7229137',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Kringwinkel zuiderkempen',
			'adress' => 'Jaak Aertslaan 7',
			'postalcode' => '2320',
			'village' => 'Hoogstraten',
			'lat' => '51.3968995',
			'long' => '4.7560718',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Abraham Hansschool',
			'adress' => 'Schoolstraat',
			'postalcode' => '2550',
			'village' => 'Kontich',
			'lat' => '51.1363629',
			'long' => '4.4443045',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Mille',
			'adress' => 'Nauwstraat 10',
			'postalcode' => '2800',
			'village' => 'Mechelen',
			'lat' => '51.0265276',
			'long' => '4.4768587',
			'website' => 'http://www.curieus.be',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'De Weegbree',
			'adress' => 'Hoogstraat 64',
			'postalcode' => '2861',
			'village' => 'Onze-Lieve-Vrouw-Waver',
			'lat' => '51.0501573',
			'long' => '4.5836735',
			'website' => 'http://www.deweegbree.be',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'De Weegbree',
			'adress' => 'Palingstraat 111',
			'postalcode' => '2870',
			'village' => 'Puurs',
			'lat' => '51.0718209',
			'long' => '4.279197',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Magazijn',
			'adress' => 'Broechemsesteenweg 121d',
			'postalcode' => '2520',
			'village' => 'Ranst',
			'lat' => '51.164399',
			'long' => '4.5928043',
			'website' => 'http://www.repaircaferanst.be',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Projectencentrum',
			'adress' => 'Kongoplein 2',
			'postalcode' => '2300',
			'village' => 'Turnhout',
			'lat' => '51.3236746',
			'long' => '4.9328218',
			'website' => '',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));

		DB::table('repaircafes')->insert(array(
			'name' => 'Gemeenschapslokaal',
			'adress' => 'Jos Geunsplein 1',
			'postalcode' => '2260',
			'village' => 'Westerlo',
			'lat' => '51.1057106',
			'long' => '4.91630358',
			'website' => 'https://sites.google.com/a/wakeup.be/repair-cafe-westerlo/',
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
		DB::table('repaircafes')->delete();
	}

}