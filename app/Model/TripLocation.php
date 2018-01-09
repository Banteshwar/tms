<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TripLocation extends Model
{
    //
    protected $guarded =  ["_token","trip_locations_id","phone","altphone","fax", "guardid"];
}
