<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInboundreceiptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inboundreceipts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_code', 10)->default('');
			$table->dateTime('grn_date')->default('0000-00-00 00:00:00');
			$table->string('grn_no', 20)->default('');
			$table->string('po_no', 20)->default('');
			$table->string('invoice_no', 20)->default('');
			$table->string('transport_mode', 100)->default('');
			$table->string('forwarder_code', 100)->default('');
			$table->string('supplier_code', 100)->default('');
			$table->string('rv_no', 100)->default('');
			$table->string('status', 10)->default('');
			$table->string('product_no', 20)->default('');
			$table->dateTime('expiry_date')->default('0000-00-00 00:00:00');
			$table->string('uom', 10)->default('');
			$table->integer('expected_qty')->default('0');
			$table->integer('delivery_qty')->default('0');
			$table->integer('accepted_qty')->default('0');
			$table->integer('rejected_qty')->default('0');
			$table->integer('outstanding_qty')->default('0');
			$table->integer('short')->default('0');
			$table->string('remarks', 500)->default('');
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
		Schema::drop('inboundreceipts');
	}

}
