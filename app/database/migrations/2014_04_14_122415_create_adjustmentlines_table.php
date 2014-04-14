<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdjustmentlinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustmentlines', function(Blueprint $table) {
			$table->increments('id');
			$table->string('adjustment_id',10)->default('');
			$table->string('location_id',10)->default('');
			$table->string('product_id',10)->default('');
			$table->string('qty',10)->default('');
			$table->string('qty_plus_minus',10)->default('');
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
		Schema::drop('adjustmentline');
	}

}
