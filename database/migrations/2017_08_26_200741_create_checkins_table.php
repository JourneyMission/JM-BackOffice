<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkins', function(Blueprint $table) {
			$table->increments('id')->Checkin_ID();
			$table->integer('Profile_ID')->Profile_ID();
			$table->integer('Checkpoint_ID')->Checkpoint_ID();
			$table->date('Checkin_Date')->Checkin_Date();

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
		Schema::drop('checkins');
	}

}
