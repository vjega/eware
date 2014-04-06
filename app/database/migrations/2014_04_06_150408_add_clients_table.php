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
			$table->string('client_code', 10)->default('');	
			$table->string('name', 300)->default('');	
			$table->string('country_code', 10)->default('');	
			$table->string('city', 50)->default('');	
			$table->string('address', 500)->default('');	
			$table->string('fax_no', 20)->default('');	
			$table->string('tel_no', 20)->default('');	
			$table->string('postal_code', 20)->default('');	
			$table->string('contact_name', 300)->default('');	
			$table->decimal('credit_limit', 10, 2)->default('0.00');	
			$table->string('payment_terms', 10)->default('');	
			$table->string('business_hour', 10)->default('');	
			$table->string('party_service_level', 100)->default('');	
			$table->string('order_priority', 10)->default('');	
			$table->string('services_provided', 100)->default('');
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
