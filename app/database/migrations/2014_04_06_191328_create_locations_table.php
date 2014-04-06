<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('location_no', 10);
			$table->string('warehouse_name', 200);
			$table->string('location_area', 100);
			$table->string('location_type', 30);
			$table->string('bin_number', 30);
			$table->string('maximum_volume', 10);
			$table->string('minimum_volume', 10);
			$table->string('location_condition', 10);
			$table->string('location_indicator', 10);
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
		Schema::drop('locations');
	}

}
