<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
 	protected $guarded =  ["_token"];
 	
 	public function contactAddress()
    {
       return  $this->hasOne('App\Model\CustomerContactDetail');
    }
}
