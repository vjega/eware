<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundissuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outboundissues', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code', 10)->default('');
			$table->string('order_no', 10)->default('');
			$table->dateTime('order_date')->default('0000-00-00 00:00:00');
			$table->string('issue_no', 10)->default('');
			$table->dateTime('issue_date', 100)->default('0000-00-00 00:00:00');
			$table->string('customer_po', 10)->default('');
			$table->string('consignee_code', 10)->default('');
			$table->string('forwarder_code', 10)->default('');
			$table->string('shipment_type', 10)->default('');
			$table->string('movement_type', 10)->default('');
			$table->string('status', 10)->default('');
			$table->string('details', 200)->default('');
			$table->string('product_no', 10)->default('');
			$table->decimal('issue_price', 10, 2)->default('0.00');
			$table->decimal('discount_price', 10, 2)->default('0.00');
			$table->string('location_no', 10)->default('');
			$table->string('product_disc', 500)->default('');
			$table->string('uom', 10)->default('');
			$table->integer('order_qty')->default('0');
			$table->integer('issue_qty')->default('0');
			$table->decimal('total_issue_price', 10, 2)->default('0.00');
			$table->integer('location_qty')->default('0');
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
		Schema::drop('outboundissues');
	}

}
