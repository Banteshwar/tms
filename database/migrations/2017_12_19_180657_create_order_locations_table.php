<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('doing_in_location')->nullable();
            $table->integer('trip_location_id')->nullable();
            $table->dateTime('appointment_date')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('driving_direction')->nullable();
            $table->string('confirmation_no')->nullable();
            $table->string('stop_off')->nullable();
            $table->string('driver_instruction')->nullable();
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
        Schema::dropIfExists('order_locations');
    }
}
