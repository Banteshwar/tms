<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckTimeDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_time_deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_id');
            $table->string('deduction_type')->nullable();
            $table->string('deduction_amount')->nullable();
            $table->string('deduction_comment')->nullable();
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
        Schema::dropIfExists('truck_time_deductions');
    }
}
