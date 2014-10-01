<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    // Many to Many
	    // create person to performance
	    Schema::create('person_performance', function($table)
	    {
	        $table->integer('person_id')->unsigned();
	        $table->foreign('person_id')->references('id')->on('people');
	        $table->integer('performance_id')->unsigned();
	        $table->foreign('performance_id')->references('id')->on('performances');
	    });
	    
	    // create person to artwork
	    Schema::create('artwork_person', function($table)
	    {
	        $table->integer('artwork_id')->unsigned();
	        $table->foreign('artwork_id')->references('id')->on('artworks');
	        $table->integer('person_id')->unsigned();
	        $table->foreign('person_id')->references('id')->on('people');
	    });
	    
	    // One to Many
	    
	    // performance belongs_to artwork; artwork has_many performance;
	    // So, performance needs an artwork_id to reference the artwork it belongs to
	    Schema::table('performances', function($table)
	    {
	        $table->integer('artwork_id')->unsigned();
	        $table->foreign('artwork_id')->references('id')->on('artworks');
	    });
	    
	    // performance belongs_to event; event has_many performance;
	    Schema::table('performances', function($table)
	    {
	        $table->integer('event_id')->unsigned();
	        $table->foreign('event_id')->references('id')->on('events');
	    });
	    
	    // event belongs_to location; location has_many events;
	    Schema::table('events', function($table)
	    {
	        $table->integer('location_id')->unsigned();
	        $table->foreign('location_id')->references('id')->on('events');
	    }); 
	    
	    // event belongs_to tour; tour has_many events;
	    Schema::table('events', function($table)
	    {
	        $table->integer('tour_id')->unsigned();
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
