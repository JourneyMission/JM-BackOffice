<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckpointsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkpoints', function(Blueprint $table) {
            $table->increments('id');
			$table->string('Checkpoint_Name')->Checkpoint_Name();
			$table->string('Checkpoint_Latitude')->Checkpoint_Latitude();
			$table->string('Checkpoint_Longtitude')->Checkpoint_Longtitude();
			$table->string('Checkpoint_LatitudeDelta')->Checkpoint_LatitudeDelta();
			$table->string('Checkpoint_LongtitudeDelta')->Checkpoint_LongtitudeDelta();
			$table->text('Checkpoint_Description')->Checkpoint_Description();
			$table->integer('Checkpoint_Score')->Checkpoint_Score();
			$table->integer('Checkpoint_SpeacialScore')->Checkpoint_SpeacialScore();
			$table->date('Checkpoint_StartDate')->Checkpoint_StartDate();
			$table->date('Checkpoint_EndDate')->Checkpoint_EndDate();
			$table->time('Checkpoint_StartTime')->Checkpoint_StratTime();
			$table->time('Checkpoint_EndTime')->Checkpoint_EndTime();
			$table->integer('Provience_ID')->Provience_ID();
			$table->integer('Category_Checkpoint_ID')->Category_Checkpoint_ID();

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
		Schema::drop('checkpoints');
	}

}
