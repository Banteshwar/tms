<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerSetUpEmail extends Model
{
    protected $guarded =  ["_token"];
}
