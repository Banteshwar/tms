<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class User extends Model
{ 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','role_id','active', 'created_at'
    ];
/*
public function User_has_roles()
    {
        return $this->belongsToMany('App\User_has_roles');
    }
    */
 public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
 
 public static function changeUserLog($to_id,$sub,$by_id)
    {
         $by_user =  User::find($by_id);
               
        DB::table('users_log')->insert(
         ['to_id' => $to_id, 'action_desc' => $sub, 'by_id' => $by_id, 'by_email' => $by_user->email]
          );
       
    }


    public static function boot()
    {
        parent::boot();
        
        // Attach event handler, on deleting or deleted of the user using model events
       //User::deleting(function($user)
        User::deleted(function($user)
        {             

           DB::table('users_drivers')->where('user_id', '=', $user->id)->delete();
        });
    }
   
	

}