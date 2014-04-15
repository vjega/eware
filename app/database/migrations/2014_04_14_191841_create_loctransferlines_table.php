<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoctransferLinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loctransferlines', function(Blueprint $table) {
			$table->increments('id');
			$table->string('loctransfer_id',10)->default('');
			$table->string('location_id',10)->default('');
			$table->string('product_id',10)->default('');
			$table->string('qty',10)->default('');
			$table->string('to_location',10)->default('');
			$table->string('qty_to_move',10)->default('');
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
		Schema::drop('loctransfer_lines');
	}

}
