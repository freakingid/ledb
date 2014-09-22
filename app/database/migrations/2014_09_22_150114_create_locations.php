<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function($table)
		{
		    $table->increments('id');
		    $table->string('slug', 32)->unique();
		    $table->string('namefull', 128);
		    $table->text('description');
		    $table->float('lat', 10, 6);
		    $table->float('long', 10, 6);
		    $table->string('addr1', 128);
		    $table->string('addr2', 128);
		    $table->string('city', 64);
		    $table->string('state', 64);
		    $table->string('zip', 32);
		    $table->string('email', 128);
		    $table->string('phone', 32);
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
		Schema::drop('locations');
	}

}
