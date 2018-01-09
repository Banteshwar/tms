<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class Role extends Model
{
  
   protected $fillable = [
        'name','created_at','updated_at'
    ];  //

  
  
  public static function FindRoleNameByUser($role_id) 
  {

  	$roleVal= DB::table('roles')->select('name')->where('id', $role_id)->get();


          // echo print_r($roleval); die;
           

        if(count($roleVal)>0)
        {
          
          foreach($roleVal as $val)
          {


            $arrVal[] = $val->name; 
          }

         $roleName=implode(", ",$arrVal); 
          
         return $roleName;

        }
        else
        {

        return '';	
        }

  }

   public static function FindRoleByUser($user_id='') 
    {

    	$roleVal= DB::table('user_has_roles')->select('roles.id','roles.name')->join('roles', 'user_has_roles.role_id', '=', 'roles.id')->where('user_has_roles.user_id', $user_id)->get();

    	 return $roleVal;
    	
    }

   


}


