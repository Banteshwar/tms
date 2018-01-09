<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;

use App\Model\Role;

use Illuminate\Support\Facades\DB;

use Auth;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   


        ////////// check access permission //////////////
        
         //DB::enableQueryLog();

     
         $aclrole = Role::where('id',Auth::user()->role_id)->pluck('acl', 'id')->toArray();

         

         //dd(DB::getQueryLog());
        
         if(empty($aclrole)) 
         {
         return back()->with(array('error' => 'You don\'t have right to access'));
         }  
         elseif(empty($aclrole[Auth::user()->role_id]))    
         {
           return back()->with(array('error' => 'You don\'t have right to access'));  
         }        
         elseif(empty(cheakAcl($aclrole[Auth::user()->role_id])))
         {

          return back()->with(array('error' => 'You don\'t have right to access'));

         }

         
        //////////// end check access permission //////////
        
        
         $roles = Role::all();
        
       

         return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       ////////// check access permission //////////////
        

     
         $aclrole = Role::where('id',Auth::user()->role_id)->pluck('acl', 'id')->toArray();

        
         if(empty($aclrole)) 
         {
         return back()->with(array('error' => 'You don\'t have right to access'));
         }
         elseif(empty($aclrole[Auth::user()->role_id]))    
         {
           return back()->with(array('error' => 'You don\'t have right to access'));  
         }               
         elseif(empty(cheakAcl($aclrole[Auth::user()->role_id])))
         {

          return back()->with(array('error' => 'You don\'t have right to access'));

         }


        //////////// end check access permission //////////

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      

        $this->validate($request, [
            'name'=>'required|unique:roles|max:120',
           
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

      

        $role->save();

        return redirect()->route('roles.index')
            ->with('flash_message',
             'Role'. $role->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        ////////// check access permission //////////////
        
       
         $aclrole = Role::where('id',Auth::user()->role_id)->pluck('acl', 'id')->toArray();

        
         if(empty($aclrole)) 
         {
         return back()->with(array('error' => 'You don\'t have right to access'));
         } 
         elseif(empty($aclrole[Auth::user()->role_id]))    
         {
           return back()->with(array('error' => 'You don\'t have right to access'));  
         } 
          elseif(empty(cheakAcl(str_replace('?',$id,$aclrole[Auth::user()->role_id]))))              
       
         {

          return back()->with(array('error' => 'You don\'t have right to access'));

         }


        //////////// end check access permission //////////

       $role = Role::findOrFail($id);
     

        return view('roles.edit', compact('role', 'permissions','role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $role = Role::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:120|unique:roles,name,'.$id,
           
        ]);

        $input = $request->except(['permissions']);
     
        $role->fill($input)->save();
       
        
        return redirect()->route('roles.index')
            ->with('flash_message',
             'Role'. $role->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       ////////// check access permission //////////////
        
        
     
         $aclrole = Role::where('id',Auth::user()->role_id)->pluck('acl', 'id')->toArray();

        
        
         if(empty($aclrole)) 
         {
         return back()->with(array('error' => 'You don\'t have right to access'));
         } 
         elseif(empty($aclrole[Auth::user()->role_id]))    
         {
           return back()->with(array('error' => 'You don\'t have right to access'));  
         } 

         elseif(empty(cheakAcl(str_replace('?',$id,$aclrole[Auth::user()->role_id]))))    
         {

          return back()->with(array('error' => 'You don\'t have right to access'));

         }


        //////////// end check access permission //////////

       

        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('flash_message',
             'Role deleted!');
    }
}
