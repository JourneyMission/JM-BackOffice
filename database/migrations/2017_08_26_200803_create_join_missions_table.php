<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinMissionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('join_missions', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('Mission_ID')->Mission_ID();
			$table->integer('Profile_ID')->Profile_ID();
			$table->integer('Mission_Status')->Mission_Status();

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
		Schema::drop('join_missions');
	}

}
