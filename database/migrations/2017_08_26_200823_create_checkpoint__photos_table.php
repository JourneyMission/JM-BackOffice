<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckpointPhotosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkpoint__photos', function(Blueprint $table) {
            $table->increments('id');
			$table->string('Checkpoint_Photo')->Checkpoint_Photo();
			$table->integer('Checkpoint_ID')->Checkpoint_ID();

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
		Schema::drop('checkpoint__photos');
	}

}
