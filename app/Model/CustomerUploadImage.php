<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerUploadImage extends Model
{
    protected $guarded =  ["_token"];
}
