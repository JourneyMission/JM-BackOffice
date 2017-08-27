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
			$table->string('Provience_name')->Provience_name();
			$table->string('Provience_CodeName')->Provience_CodeName();

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
		Schema::drop('proviences');
	}

}
