<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
            $table->increments('id');
			$table->string('Profile_ProviderID')->Profile_ProviderID();
			$table->string('Profile_Name')->Profile_Name();
			$table->string('Profile_Email')->Profile_Email();
			$table->integer('user_id')->user_id();
			$table->boolean('Profile_Team')->Profile_Team()->nullable();
			$table->boolean('Profile_Role')->Profile_Role()->nullable();

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
		Schema::drop('profiles');
	}

}
