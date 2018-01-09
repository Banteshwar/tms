<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			 $table->string('acl',256)->nullable();
            $table->timestamps();
        });
		
		 // Insert some stuff
		 
		 $myItems = [
            ['id'=>'1','name'=>'Admin'],
            ['id'=>'2','name'=>'Driver'],
            ['id'=>'3','name'=>'Guard'],
			['id'=>'4','name'=>'Manager']
        ];
		
		DB::table("roles")->insert($myItems);
		
        		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
