<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('IncidentsTableSeeder');
		$this->call('WitnessesTableSeeder');
		$this->call('FollowupsTableSeeder');
		$this->call('RolesTableSeeder');
	}

}