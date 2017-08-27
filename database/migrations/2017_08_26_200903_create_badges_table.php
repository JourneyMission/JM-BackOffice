<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('badges', function(Blueprint $table) {
            $table->increments('id');
			$table->string('Badge_Name')->Badge_Name();
			$table->text('Badge_Description')->Badge_Description();
			$table->string('Badge_Photo')->Badge_Photo();
			$table->integer('Badge_Rank')->Badge_Rank();
			$table->boolean('Badge_Status')->Badge_Status();
			$table->date('Badge_StartDate')->Badge_StartDate();
			$table->date('Badge_EndDate')->Badge_EndDate();
			$table->time('Badge_StartTime')->Badge_StartTime();
			$table->time('Badge_EndTime')->Badge_EndTime();
			$table->integer('Badge_Required')->Badge_Required();
			$table->integer('Badge_Category_Checkpoint')->Badge_Category_Checkpoint();
			$table->integer('Badge_Category_Checkpoint_Count')->Badge_Category_Checkpoint_Count();
			$table->integer('Badge_Region_ID')->Badge_Region_ID();
			$table->integer('Badge_Region_Count')->Badge_Region_Count();
			$table->integer('Badge_Category_Mission')->Badge_Category_Mission();
			$table->integer('Badge_Category_Mission_Count')->Badge_Category_Mission_Count();
			$table->integer('Badge_Provience_ID')->Badge_Provience_ID();
			$table->integer('Badge_Provience_Count')->Badge_Provience_Count();
			$table->boolean('Badge_Provience_Check')->Badge_Provience_Check();

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
		Schema::drop('badges');
	}

}
