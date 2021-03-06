<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->string('site_id')->default('');
		});
		DB::update('alter table clients modify client_code varchar(50)');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			
		});
	}

}
