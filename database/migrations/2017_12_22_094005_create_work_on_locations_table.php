<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOnLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_on_locations', function (Blueprint $table) {
           $table->increments('id');
           $table->string('work_name');
           $table->integer('show_on_order');
           $table->timestamps();
        });
         DB::table('work_on_locations')->insert([ ['work_name' => 'Pickup - loaded', 'show_on_order' => 1],
['work_name' => 'Deliver', 'show_on_order' => 1],
['work_name' => 'Return - empty', 'show_on_order' => 1],
['work_name' => 'Bring to Yard- Loaded', 'show_on_order' => 0],
['work_name' => 'Pickup from Yard- Loaded', 'show_on_order' => 0],
['work_name' => 'Bring to Yard - Empty', 'show_on_order' => 0],
['work_name' => 'Pickup from Yard - Empty', 'show_on_order' => 0],
['work_name' => 'Bobtail From', 'show_on_order' => 0],
['work_name' => 'Bobtail To', 'show_on_order' => 0],
['work_name' => 'Bring Chassis to Yard', 'show_on_order' => 0],
['work_name' => 'Pickup Chassis from Yard', 'show_on_order' => 0],
['work_name' => 'Pickup Chassis', 'show_on_order' => 1],
['work_name' => 'Return Chassis', 'show_on_order' => 1],
['work_name' => 'Pickup Third-Party Container', 'show_on_order' => 0],
['work_name' => 'Bring Third-Party Container to Yard', 'show_on_order' => 0],
['work_name' => 'Pickup Third-Party Container from Yard', 'show_on_order' => 0],
['work_name' => 'Return Third-Party Container', 'show_on_order' => 0],
['work_name' => 'Street Turn', 'show_on_order' => 0],
['work_name' => 'Close Move', 'show_on_order' => 0]
]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_on_locations');
    }
}
