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
			$table->integer('Badge_Rank')->Badge_Rank()->nullable();
			$table->boolean('Badge_Status')->Badge_Status()->default(0);
			$table->date('Badge_StartDate')->Badge_StartDate()->nullable();
			$table->date('Badge_EndDate')->Badge_EndDate()->nullable();
			$table->time('Badge_StartTime')->Badge_StartTime()->nullable();
			$table->time('Badge_EndTime')->Badge_EndTime()->nullable();
			$table->integer('Badge_Required')->Badge_Required()->nullable();
			$table->integer('Badge_Category_Checkpoint')->Badge_Category_Checkpoint()->nullable();
			$table->integer('Badge_Category_Checkpoint_Count')->Badge_Category_Checkpoint_Count()->nullable();
			$table->integer('Badge_Region_ID')->Badge_Region_ID()->nullable();
			$table->integer('Badge_Region_Count')->Badge_Region_Count()->nullable();
			$table->integer('Badge_Category_Mission')->Badge_Category_Mission()->nullable();
			$table->integer('Badge_Category_Mission_Count')->Badge_Category_Mission_Count()->nullable();
			$table->integer('Badge_Provience_ID')->Badge_Provience_ID()->nullable();
			$table->integer('Badge_Provience_Count')->Badge_Provience_Count()->nullable();
			$table->boolean('Badge_Provience_Check')->Badge_Provience_Check()->nullable();
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
		Schema::drop('badges');
	}

}
