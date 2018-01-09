<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GuardDetail extends Model
{
    //
    protected $guarded =  ["_token"];
    
}
