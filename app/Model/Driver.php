<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $guarded = ['_token'];

    public function DriverLicenceInsurance()
    {
    	return  $this->hasOne('App\Model\DriverLicenceInsurance');
    }
}

