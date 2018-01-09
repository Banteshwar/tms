<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverFormw9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_formw9s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id');
            $table->string('name')->nullable(); 
            $table->string('bussiness_name')->nullable(); 
            $table->string('type')->nullable(); 
            $table->string('type_other')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('state')->nullable(); 
            $table->string('zip')->nullable(); 
            $table->string('tin')->nullable(); 
            $table->string('ssn')->nullable(); 
            $table->string('ein')->nullable(); 
            $table->string('paidby')->nullable(); 
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
        Schema::dropIfExists('driver_formw9s');
    }
}
