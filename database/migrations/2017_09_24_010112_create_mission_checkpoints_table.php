<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionCheckpointsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mission_checkpoints', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('Mission_ID')->Mission_ID();
			$table->integer('Checkpoint_ID')->Checkpoint_ID();
			$table->integer('Order')->Order();
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
		Schema::drop('mission_checkpoints');
	}

}
