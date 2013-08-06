<?php

use Illuminate\Database\Migrations\Migration;

class CreateFollowupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followups', function($table) {
			$table->increments('id');
			$table->integer('incident_id');
			$table->date('date');
			$table->string('staff');
			$table->string('whom');
			$table->string('notes');

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
		Schema::drop('followups');
	}

}