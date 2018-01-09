<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripWorkLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_work_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('trip_work_id');
            $table->integer('trip_location_id');
            $table->integer('trip_order');
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
        Schema::dropIfExists('trip_work_locations');
    }
}
