<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoctransfersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loctransfers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code', 10)->default('');
			$table->dateTime('movement_date')->default('0000-00-00 00:00:00	');
			$table->string('movement_number', 10)->default('');
			$table->string('remarks', 300)->default('');
			$table->string('reference_no', 10)->default('');
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
		Schema::drop('loctransfers');
	}

}
