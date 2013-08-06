<?php

class IncidentsTableSeeder extends Seeder {

	public function run()
	{
		$incidents = array(
			'first_name' => 'Jeff',
			'last_name' => 'Finley',
			'incident_date' => '2012-01-01', 
			'incident_branch' => 'Central'
		);

		// Uncomment the below to run the seeder
		DB::table('incidents')->insert($incidents);
	}

}
