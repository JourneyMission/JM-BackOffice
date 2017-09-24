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
			$table->string('Checkpoint_Icon')->Checkpoint_Icon()->nullable();
			$table->string('Checkpoint_GrayIcon')->Checkpoint_GrayIcon()->nullable();
			$table->text('Checkpoint_Description')->Checkpoint_Description();
			$table->integer('Checkpoint_Score')->Checkpoint_Score();
			$table->integer('Checkpoint_SpeacialScore')->Checkpoint_SpeacialScore()->nullable();
			$table->date('Checkpoint_StartDate')->Checkpoint_StartDate()->nullable();
			$table->date('Checkpoint_EndDate')->Checkpoint_EndDate()->nullable();
			$table->time('Checkpoint_StartTime')->Checkpoint_StratTime()->nullable();
			$table->time('Checkpoint_EndTime')->Checkpoint_EndTime()->nullable();
			$table->integer('Provience_ID')->Provience_ID();
			$table->integer('Category_Checkpoint_ID')->Category_Checkpoint_ID()->nullable();
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
		Schema::drop('checkpoints');
	}

}
