<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$admin = array(
			'name' => 'Admin',
			'permissions' => "['create_incident','edit_incident','view_incident','review_incident','signoff_incident','close_incident']"
		);

		$viewOnly = array(
			'name' => 'ViewOnly',
			'permissions' => "['view_incident']"
		);

		$creator = array(
			'name' => 'Creator',
			'permissions' => "['create_incident','edit_incident','view_incident']"
		);

		$reviewer = array(
			'name' => 'Reviewer',
			'permissions' => "['review_incident']"
		);

		$risk = array(
			'name' => 'Risk',
			'permissions' => "['create_incident','edit_incident','view_incident','review_incident','signoff_incident','close_incident']"
		);

		// Uncomment the below to run the seeder
		DB::table('roles')->insert($admin);
		DB::table('roles')->insert($viewOnly);
		DB::table('roles')->insert($creator);
		DB::table('roles')->insert($reviewer);
		DB::table('roles')->insert($risk);
	}

}