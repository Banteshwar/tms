<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('charge_type')->nullable();
            $table->string('units')->nullable();
            $table->string('rates')->nullable();
            $table->string('amounts')->nullable();
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
        Schema::dropIfExists('order_charges');
    }
}
