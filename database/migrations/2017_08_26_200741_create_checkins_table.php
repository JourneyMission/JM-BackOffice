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
			$table->integer('Mission_ID')->Mission_ID();
			$table->integer('Checkpoint_ID')->Checkpoint_ID();
			$table->date('Checkin_Date')->Checkin_Date();
$table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
