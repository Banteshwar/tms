<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('business_name');
            $table->string('type');
            $table->string('other_type')->nullable();;
            $table->string('address')->nullable();;
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('tin');
            $table->string('ssn')->nullable();;
            $table->string('ein')->nullable();;
            $table->string('paid_by');
            $table->string('comments')->nullable();;
            $table->string('terminal');
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
        Schema::dropIfExists('owners');
    }
}
