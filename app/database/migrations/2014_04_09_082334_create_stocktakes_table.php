<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocktakesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocktakes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code', 100)->default('');
			$table->dateTime('cycle_count_date')->default('0000-00-00 00:00:00');
			$table->string('reference_no', 10)->default('');
			$table->string('cycle_count_no', 10)->default('');
			$table->string('status', 20)->default('');
			$table->string('remarks', 300)->default('');
			$table->string('stock', 10)->default('');
			$table->string('mark', 10)->default('');
			$table->string('confirm_cycle_count', 10)->default('');
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
		Schema::drop('stocktakes');
	}

}
