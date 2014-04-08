<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdjustmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustments', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code', 10)->default('');
			$table->dateTime('adjustment_date')->default('0000-00-00 00:00:00');
			$table->integer('adjustment_number')->default('0');
			$table->string('remarks', 300)->default('');
			$table->string('reference_no', 10)->default('');
			$table->string('adjustment_view', 200)->default('');
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
		Schema::drop('adjustments');
	}

}
