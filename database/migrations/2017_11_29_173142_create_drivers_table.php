<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('terminalid');
            $table->string('downer')->nullable();;
            $table->string('dfname')->nullable();;
            $table->string('dmname')->nullable();
            $table->string('dlname')->nullable();;
            $table->string('daddress')->nullable();;
            $table->string('dcity')->nullable();;
            $table->string('dstate')->nullable();;
            $table->string('dzip')->nullable();;
            $table->string('dcontact')->nullable();
            $table->string('dcellno')->nullable();
            $table->string('dphonecarrier')->nullable();
            $table->string('demail')->nullable();
            $table->date('dHiredDate')->nullable();
            $table->text('dcomments')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
