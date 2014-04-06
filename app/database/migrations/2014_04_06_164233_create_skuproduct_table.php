<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkuproductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skuproduct', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code',5);
			$table->string('product_code',20);
			$table->string('product_name',20);
			$table->mediumText('description');
			$table->string('product_category',5);
			$table->string('quantity',20);
			$table->string('uom_id',5);
			$table->string('product_dimensions',50);
			$table->string('serial_number',20);
			$table->dateTime('expiry_date');
			$table->string('storage_form',20);
			$table->string('location_area',20);
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
		Schema::drop('skuproduct');
	}

}
