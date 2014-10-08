<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableReferences extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    DB::statement('ALTER TABLE `performances` MODIFY `artwork_id` INTEGER UNSIGNED NULL;');
	    DB::statement('UPDATE `performances` SET `artwork_id` = NULL WHERE `artwork_id` = 0;');
	    
	    DB::statement('ALTER TABLE `performances` MODIFY `event_id` INTEGER UNSIGNED NULL;');
	    DB::statement('UPDATE `performances` SET `event_id` = NULL WHERE `event_id` = 0;');

	    DB::statement('ALTER TABLE `event_occurrences` MODIFY `location_id` INTEGER UNSIGNED NULL;');
	    DB::statement('UPDATE `event_occurrences` SET `location_id` = NULL WHERE `location_id` = 0;');

	    DB::statement('ALTER TABLE `event_occurrences` MODIFY `tour_id` INTEGER UNSIGNED NULL;');
	    DB::statement('UPDATE `event_occurrences` SET `tour_id` = NULL WHERE `tour_id` = 0;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    DB::statement('UPDATE `performances` SET `artwork_id` = 0 WHERE `artwork_id` IS NULL;');
	    DB::statement('ALTER TABLE `performances` MODIFY `artwork_id` INTEGER UNSIGNED;');
	    
	    DB::statement('UPDATE `performances` SET `event_id` = 0 WHERE `event_id` IS NULL;');
	    DB::statement('ALTER TABLE `performances` MODIFY `event_id` INTEGER UNSIGNED;');

	    DB::statement('UPDATE `event_occurrences` SET `location_id` = 0 WHERE `location_id` IS NULL;');
	    DB::statement('ALTER TABLE `event_occurrences` MODIFY `location_id` INTEGER UNSIGNED;');

	    DB::statement('UPDATE `event_occurrences` SET `tour_id` = 0 WHERE `tour_id` IS NULL;');
	    DB::statement('ALTER TABLE `event_occurrences` MODIFY `tour_id` INTEGER UNSIGNED;');
	}

}
