<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverLicenceInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_licence_insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id');
            $table->string('social_security_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('cdl')->nullable();
            $table->string('dstate')->nullable();
            $table->date('cdl_exp_on')->nullable();
            $table->string('cdlHaz')->nullable();
            $table->string('medical_card')->nullable();
            $table->string('insurance')->nullable();
            $table->string('occacc')->nullable();
            $table->string('insurance_extra')->nullable();
            $table->string('pd')->nullable();
            $table->string('twic_card')->nullable();
            $table->date('twic_exp_on')->nullable();
            $table->date('sealink_exp_on')->nullable();
            $table->string('fleet_one')->nullable();
            $table->date('medical_exp_on')->nullable();
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
        Schema::dropIfExists('driver_licence_insurances');
    }
}
