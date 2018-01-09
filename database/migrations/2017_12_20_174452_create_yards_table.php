<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_locations_id');
			$table->string('location_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
			$table->string('zip');
			$table->string('phone');
			$table->string('altphone');
			$table->string('fax');
			$table->integer('guardid')->nullable();
            $table->timestamps();
        });
		
		
		// Insert some stuff
		 
		 $myItems = [
            ['trip_locations_id'=>'1','location_name'=>'Norfolk Southern','address'=>'6000 Dr. Luke Glen Garrett','city'=>'Austell','state'=>'GA','zip'=>'30106','phone'=>'455530106','altphone'=>'30106','fax'=>'30106'],
            ['trip_locations_id'=>'2','location_name'=>'Line New York Office','address'=>'302 Port Jersey Boulevard','city'=>'Jersey City','state'=>'NJ','zip'=>'07305','phone'=>'234407305','altphone'=>'234407305','fax'=>'234407305'],
            ['trip_locations_id'=>'3','location_name'=>'Union Pacific Global 3','address'=>'2701 Intermodal Drive','city'=>'Rochelle','state'=>' IL','zip'=>'60168','phone'=>'234407305','altphone'=>'234407305','fax'=>'234407305']
			
        ];
		
		DB::table("yards")->insert($myItems);
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yards');
    }
}
