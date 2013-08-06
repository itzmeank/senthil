<?php

use Illuminate\Database\Migrations\Migration;

class CreateWitnessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('witnesses', function($table) {
			$table->increments('id');
			$table->integer('incident_id');
			$table->string('type');
			$table->string('involvement');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('age');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('phone');
			$table->string('email');

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
		Schema::drop('witnesses');
	}

}