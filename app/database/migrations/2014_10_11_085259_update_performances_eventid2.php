<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePerformancesEventid2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        // Augh, not plural event occurrences...!
		Schema::table('performances', function($table)
        {
            // break foreign reference
		    $table->dropForeign('performances_event_occurrences_id_foreign');
            // rename the column
            $table->renameColumn('event_occurrences_id', 'event_occurrence_id');
            // remake the foreign reference
		    $table->foreign('event_occurrence_id')->references('id')->on('event_occurrences');
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
            // break foreign reference
            $table->dropForeign('performances_event_occurrence_id_foreign');
            // rename column
            $table->renameColumn('event_occurrence_id', 'event_occurrences_id');
            // remake the foreign reference
		    $table->foreign('event_id')->references('id')->on('event_occurrences');
        });
	}

}
