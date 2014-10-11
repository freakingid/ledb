<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePerformanceConstraints extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    // table 'person_performance' changed names to correct 'performance_person'
	    // but to use auto table names etc. we also need to fix the relationship names
		Schema::table('performance_person', function($table)
		{
            $table->dropForeign('person_performance_person_id_foreign');
            $table->dropForeign('person_performance_performance_id_foreign');
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('performance_id')->references('id')->on('performances');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// TODO should add the reverting behavior!!
	}


}
