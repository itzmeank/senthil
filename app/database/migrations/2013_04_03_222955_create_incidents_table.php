<?php

use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incidents', function($table) {
			$table->increments('id');

			$table->string('incident_number');
			$table->string('incident_status');
			$table->date('incident_date');
			$table->string('incident_time');
			$table->string('incident_branch');
			$table->string('incident_offsite_location');
			$table->string('incident_location');
			$table->string('report');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('birthdate');
			$table->string('gender');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('phone');
			$table->string('email');
			$table->string('status');
			$table->string('involvement');
			$table->string('parent_first_name');
			$table->string('parent_last_name');
			$table->string('parent_address');
			$table->string('parent_city');
			$table->string('parent_state');
			$table->string('parent_zip');
			$table->string('parent_phone');
			$table->string('parent_email');
			$table->text('description');
			$table->text('medical_info');
			$table->string('first_aid');
			$table->string('first_aid_whom');
			$table->string('head_injury');
			$table->string('head_injury_whom');
			$table->string('blood_borne');
			$table->string('blood_borne_whom');
			$table->string('emergency_services');
			$table->string('hospital');
			$table->string('hospital_name');
			$table->string('parent_contacted');
			$table->string('parent_contacted_whom');
			$table->string('parent_contacted_time');
			$table->string('parent_contacted_outcome');
			$table->string('left_site_time');
			$table->string('left_site_with');
			$table->string('previous_injury');
			$table->text('additional_info');
			$table->string('docpath');
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
		Schema::drop('incidents');
	}

}
