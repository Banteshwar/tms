<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckOtherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_other_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_id');
            $table->string('truck')->nullable();
            $table->string('track_fuel_usage')->nullable();
            $table->string('physical_damage')->nullable();
            $table->string('physical_damage_text')->nullable();
            $table->string('non_truck_lib')->nullable();
            $table->string('calculate_ifta')->nullable();
            $table->string('calculate_ifta_text')->nullable();
            $table->string('ny_hut')->nullable();
            $table->string('parking_at_compy_yard')->nullable();
            $table->string('referred_by_truck')->nullable();
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
        Schema::dropIfExists('truck_other_details');
    }
}
