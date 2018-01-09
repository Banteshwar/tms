<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTripDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_trip_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('trip_no');
            $table->integer('driver_id');
            $table->string('truck_id');
            $table->dateTime('start_trip_date')->nullable();
            $table->dateTime('completed_trip_date')->nullable();
            $table->string('comments')->nullable();
            $table->text('payment_details')->nullable();
            $table->date('dispatch_date')->nullable();
            $table->string('dispatch_by')->nullable();
            $table->date('completed_date')->nullable();
            $table->string('completed_by')->nullable();
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
        Schema::dropIfExists('order_trip_details');
    }
}
