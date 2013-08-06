<?php

class WitnessesTableSeeder extends Seeder {

	public function run()
	{
		$witnesses = array(
			'incident_id' => 1,
			'first_name' => 'John',
			'last_name' => 'Doe'
		);

		// Uncomment the below to run the seeder
		DB::table('witnesses')->insert($witnesses);
	}

}
