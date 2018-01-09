<?php

	namespace App\Model;
	use Illuminate\Database\Eloquent\Model;

	class Truck extends Model
	{
		protected $guarded =  ["_token"];

		/*public function Owner()
		{
			return $this->hasOne('App\Model\TruckOwner');
		}*/
	}
