<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviencesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proviences', function(Blueprint $table) {
            $table->increments('id');
			$table->string('Provience_Name')->Provience_Name();
			$table->string('Provience_CodeName')->Provience_CodeName();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proviences');
	}

}
