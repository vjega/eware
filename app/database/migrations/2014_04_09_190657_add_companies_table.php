<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function(Blueprint $table) {

			$table->string('region', 50)->default('');	
			$table->string('site', 50)->default('');	
			$table->integer('site_number')->default('');	
			$table->string('site_type', 50)->default('');	
			$table->string('google_earth', 50)->default('');	
			$table->string('addr2', 50)->default('');	
			$table->string('addr3', 50)->default('');	
			$table->string('state', 50)->default('');	
			$table->string('email', 50)->default('');	
			$table->string('tel_no_2', 20)->default('');	
			$table->string('tax', 20)->default('');	
			$table->string('biz_type', 20)->default('');	
			$table->string('web_site', 50)->default('');	
			$table->string('service_contract_file', 100)->default('');	
			$table->string('company_instruction_file', 100)->default('');	
			$table->string('operation_policy_file', 100)->default('');	
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function(Blueprint $table) {
			
		});
	}

}
