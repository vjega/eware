<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('username');
		    $table->string('password');
		    $table->string('fname');
		    $table->string('lname');
		    $table->string('email');
		    $table->integer('warehouse_id');
		    $table->string('status');
		    $table->dateTime('exp_on');
		    $table->integer('created_by');
		    $table->integer('updated_by');
		    $table->boolean('isdelete');		
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
		Schema::drop('users');
		//
	}

}
