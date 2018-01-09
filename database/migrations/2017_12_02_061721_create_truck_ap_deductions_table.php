<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckApDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_ap_deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_id');            
            $table->string('account_type')->nullable();
            $table->date('open_date')->nullable();
            $table->string('frequency')->nullable();
            $table->string('deduction_amount')->nullable();
            $table->string('deduction')->nullable();
            $table->string('limit_cycle')->nullable();
            $table->integer('maximum_limit')->nullable();
            $table->string('total_collected')->nullable();
            $table->string('disp_tot_coltd')->nullable();
            $table->string('start_after')->nullable();
            $table->string('comment_setlmnt')->nullable();
            $table->string('comments')->nullable();
            $table->string('accumulate')->nullable();
            $table->string('due')->nullable();
            $table->string('installment')->nullable();
            $table->string('acount_status')->nullable();
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
        Schema::dropIfExists('truck_ap_deductions');
    }
}
