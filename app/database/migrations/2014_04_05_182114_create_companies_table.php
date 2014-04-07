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
            $table->string('name',50);
            $table->string('country_code',50);
            $table->string('city',50);
            $table->string('address',50);
            $table->string('fax_no',50);
            $table->string('tel_no',50);
            $table->string('postal_code',50);
            $table->string('contact_name',50);
            $table->decimal('credit_limit',12,2);
            $table->string('payment_terms',500);
            $table->string('biz_hour',50);
            $table->string('party_service_level',50);
            $table->string('order_priority',50);
            $table->string('services_provided',50);
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
