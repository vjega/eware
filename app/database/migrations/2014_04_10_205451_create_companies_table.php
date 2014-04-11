<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('country', 100)->default('');
			$table->string('region', 100)->default('');
			$table->string('currency', 100)->default('');
			$table->string('number_of_site', 100)->default('');
			$table->string('site_type', 100)->default('');
			$table->string('company_name', 100)->default('');
			$table->string('city', 100)->default('');
			$table->string('google_earth', 100)->default('');
			$table->string('address1', 100)->default('');
			$table->string('address2', 100)->default('');
			$table->string('address3', 100)->default('');
			$table->string('state', 100)->default('');
			$table->string('postal_code', 10)->default('');
			$table->string('email', 100)->default('');
			$table->string('tel_number1', 20)->default('');
			$table->string('tel_number2', 20)->default('');
			$table->string('fax_number', 20)->default('');
			$table->string('tax', 50)->default('');
			$table->string('order_priority', 30)->default('');
			$table->string('service_level', 30)->default('');
			$table->string('service_provided', 30)->default('');
			$table->string('biz_type', 30)->default('');
			$table->string('biz_hours', 30)->default('');
			$table->decimal('credit_limit', 10,2)->default('0.00');
			$table->string('web_site', 100)->default('');
			$table->string('contact_name', 200)->default('');
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
		Schema::drop('companies');
	}

}
