<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Yard extends Model
{
   protected $fillable = [
        'trip_locations_id','location_name','address','city','state','zip','phone','altphone','fax','guardid','created_at'
    ];
}
