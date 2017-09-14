<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('missions', function(Blueprint $table) {
            $table->increments('id');
			$table->string('Mission_Name')->Mission_Name();
			$table->text('Mission_Description')->Mission_Description();
			$table->text('MissionCheckpointOrder')->MissionCheckpointOrder();
			$table->string('Mission_Icon')->Mission_Icon();
			$table->integer('Mission_Score')->Mission_Score();
			$table->string('Mission_Photo')->Mission_Photo();
			$table->integer('Region_ID')->Region_ID();
			$table->integer('Category_Mission_ID')->Category_Mission_ID()->nullable();
			$table->integer('Mission_Source')->Mission_Source();
			$table->integer('Mission_Destination')->Mission_Destination();
			$table->boolean('Mission_Status')->Mission_Status()->default(0);
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
		Schema::drop('missions');
	}

}
