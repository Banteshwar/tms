<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deliver_id');
            $table->integer('order_id');
            $table->integer('trip_work_id');
            $table->string('location_name');            
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->timestamps();
        });
		
		
		// Insert some stuff
		 
		 $myItems = [
            ['deliver_id'=>'4','order_id'=>'0','trip_work_id'=>'0','location_name'=>'Norfolk Southern','address'=>'6000 Dr. Luke Glen Garrett','city'=>'Austell','state'=>'GA','zip'=>'30106'],
            ['deliver_id'=>'4','order_id'=>'0','trip_work_id'=>'0','location_name'=>'Line New York Office','address'=>'302 Port Jersey Boulevard','city'=>'Jersey City','state'=>'NJ','zip'=>'07305'],
            ['deliver_id'=>'4','order_id'=>'0','trip_work_id'=>'0','location_name'=>'Union Pacific Global 3','address'=>'2701 Intermodal Drive','city'=>'Rochelle','state'=>' IL','zip'=>'60168']
			
        ];
		
		DB::table("trip_locations")->insert($myItems);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_locations');
    }
}
