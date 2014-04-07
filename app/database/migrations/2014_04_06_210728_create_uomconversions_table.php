<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUomconversionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uomconversions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code', 20)->default('');
			$table->string('product_number', 20)->default('');
			$table->string('from_uom', 10)->default('');
			$table->decimal('conversion_rate', 10,2)->default('00.0');
			$table->string('to_uom', 10)->default('');
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
		Schema::drop('uomconversion');
	}

}
