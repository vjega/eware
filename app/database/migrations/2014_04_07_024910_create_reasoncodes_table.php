<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReasoncodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reasoncodes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('reason_code', 10)->default('');
			$table->string('reason_type', 10)->default('');
			$table->string('description', 500)->default('');
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
		Schema::drop('reasoncodes');
	}

}
