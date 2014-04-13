<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemledgerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itemledger', function(Blueprint $table) {
			$table->increments('id');
			$table->string('cust_code', 20)->default('');
			$table->string('client_code', 20)->default('');
			$table->string('location_code', 20);
			$table->string('ref_no', 20);
			$table->string('item_code', 20);
			$table->integer('qty');
			$table->string('narration', 100);
			$table->string('status', 30);
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
		Schema::drop('itemledger');
	}

}
