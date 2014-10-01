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
	        $table->foreign('location_id')->references('id')->on('locations');
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
		// TODO: we probably need to remove references before we can drop certain columns or tables
		// this will be with dropForeign
		// http://laravel.com/docs/4.2/schema#foreign-keys
		// table_field_foreign
		// dropForeign('locations_id_foreign');
		
		// TODO: There are more foreigns to remove. Need one dropForeign for eadh foreign
		// remove one to many references
		Schema::table('events', function($table)
		{
			$table->dropForeign('locations_id_foreign'); // TODO is this correct?
			$table->dropForeign('tours_id_foreign'); // TODO is this correct?
			$table->dropColumn(array('tour_id', 'location_id'));
		});
		Schema::table('performances', function($table)
		{
			$table->dropForeign('artworks_id_foreign'); // TODO is this correct?
			$table->dropColumn(array('event_id', 'artwork_id'));
		});

		// remove pivot tables
		Schema::drop('person_performance');
		Schema::drop('artwork_person');
	}

}
