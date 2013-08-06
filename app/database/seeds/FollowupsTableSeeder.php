<?php

class FollowupsTableSeeder extends Seeder {

	public function run()
	{
		$followups = array(
			'incident_id' => 1,
			'staff' => 'John Doe',
			'date' => '2012-01-01',
			'notes' => 'This is a note about the followup'
		);

		// Uncomment the below to run the seeder
		DB::table('followups')->insert($followups);
	}

}