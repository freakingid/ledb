<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTours extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tours', function($table)
		{
		    $table->increments('id');
		    $table->string('slug', 32)->unique();
		    $table->string('namefull', 128);
		    $table->text('description');
		    $table->datetime('timestart');
		    $table->datetime('timeend');
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
		Schema::drop('tours');
	}

}
