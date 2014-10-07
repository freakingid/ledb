<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsConstraints extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// drop foreign keys and reassert them with correct name
		Schema::table('performances', function($table)
		{
		    $table->dropForeign('performances_event_id_foreign');
		    $table->foreign('event_id')->references('id')->on('event_occurrences');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::table('performances', function($table)
	    {
		    $table->dropForeign('performances_event_id_foreign');
		    $table->foreign('event_id')->references('id')->on('events');
		});
	}

}
