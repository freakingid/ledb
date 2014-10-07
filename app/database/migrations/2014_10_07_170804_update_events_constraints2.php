<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsConstraints2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event_occurrences', function($table)
		{
		    $table->dropForeign('events_location_id_foreign');
		    $table->dropForeign('events_tour_id_foreign');
	        $table->foreign('location_id')->references('id')->on('locations');
	        $table->foreign('tour_id')->references('id')->on('tours');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
