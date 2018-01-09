<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBillingOtherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_billing_other_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('invoive_term')->nullable();
            $table->string('invoice_send_by')->nullable();
            $table->string('location')->nullable();
            $table->text('attach_these')->nullable();
            $table->string('attention_invoice')->nullable();
            $table->string('batch_billing')->nullable();
            $table->string('send_invoice_to')->nullable();
            $table->string('send_invoice_cc')->nullable();
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
        Schema::dropIfExists('customer_billing_other_details');
    }
}
