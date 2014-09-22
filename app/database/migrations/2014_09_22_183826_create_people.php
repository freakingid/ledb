<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeople extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function($table)
		{
		    $table->increments('id');
		    $table->string('username', 128)->unique();
		    $table->string('namelast', 64);
		    $table->string('namefirst', 64);
		    $table->date('dob');
		    $table->string('email', 128);
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
		Schema::drop('people');
	}

}
