<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBasicInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('order_basics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('terminal')->nullable();
            $table->string('line_haul')->nullable();
            $table->string('import_export')->nullable();
            $table->string('otherorbobtaildata')->nullable();
            $table->string('customer_billee_name')->nullable();
            $table->dateTime('appointment_date')->nullable();
            $table->string('reference')->nullable();
            $table->string('booking_bl')->nullable();
            $table->string('seal')->nullable();
            $table->text('container_chassis')->nullable();
            $table->string('load_weight')->nullable();
            $table->string('load_weight_other')->nullable();
            $table->string('pickup')->nullable();
            $table->string('commodity')->nullable();
            $table->string('no_of_packages')->nullable();
            $table->string('eta')->nullable();
            $table->date('release_date')->nullable();
            $table->string('strong_lfd')->nullable();
            $table->string('perdlem_lfd')->nullable();
            $table->string('ship_rail_line')->nullable();
            $table->string('vessel')->nullable();
            $table->string('voyage')->nullable();
            $table->string('sch_at')->nullable();
            $table->string('terminated_at')->nullable();
            $table->dateTime('sch_date')->nullable();
            $table->dateTime('ter_date')->nullable();
            $table->string('basic_comments')->nullable();   
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
        Schema::dropIfExists('order_basics');
    }
}
