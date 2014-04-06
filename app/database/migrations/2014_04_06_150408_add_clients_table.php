<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->string('client_code', 10);	
			$table->string('name', 300);	
			$table->string('country_code', 10);	
			$table->string('city', 50);	
			$table->string('address', 500);	
			$table->string('fax_no', 20);	
			$table->string('tel_no', 20);	
			$table->string('postal_code', 20);	
			$table->string('contact_name', 300);	
			$table->decimal('credit_limit', 10, 2);	
			$table->string('payment_terms', 10);	
			$table->string('business_hour', 10);	
			$table->string('party_service_level', 100);	
			$table->string('order_priority', 10);	
			$table->string('services_provided', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			
		});
	}

}
