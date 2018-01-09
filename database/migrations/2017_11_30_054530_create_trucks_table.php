<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('truck_type');
            $table->string('terminal')->nullable();
            $table->string('owner')->nullable();
            $table->string('current_driver')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->string('vin_no')->nullable();
            $table->string('license_plate_no')->nullable();
            $table->string('state')->nullable();
            $table->date('service_start_date')->nullable();
            $table->date('reg_expires_on')->nullable();
            $table->date('anul_insp_expir_on')->nullable();
            $table->date('quart_inst_expir')->nullable();
            $table->date('bobtl_insur_expir')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('trucks');
    }
}
