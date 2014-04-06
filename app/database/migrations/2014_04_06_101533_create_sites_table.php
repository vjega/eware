<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sites', function(Blueprint $table) {
			$table->increments('id');
			$table->string('company_code',10);
			$table->string('name',100);
			$table->string('country',100);
			$table->string('region',100);
			$table->string('city',100);
			$table->string('currency',100);
			$table->string('addrs1',100);
			$table->string('addrs2',100);
			$table->string('addrs3',100);
			$table->string('email',100);
			$table->string('website',100);
			$table->string('tel_no1',100);
			$table->string('tel_no2',100);
			$table->string('fax_no',100);
			$table->string('postal_code',100);
			$table->string('biz_type',100);
			$table->string('biz_hours',100);
			$table->string('credit_limit',100);
			$table->string('priority',100);
			$table->string('zonal_level',100);
			$table->string('vendor_file',100);
			$table->string('customer_file',100);
			$table->string('support_source_file',100);
			$table->string('threepl_file',100);
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
		Schema::drop('site');
	}

}
