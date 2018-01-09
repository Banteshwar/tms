<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Auth;

use App\Model\User;

use App\Model\Role;

use DB;

use Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$users = User::latest()->paginate(6);

          $users = User::all();

         

         // echo print_r($users); die;

         foreach($users as $val)
              {

              $val->rolevalue=Role::FindRoleNameByUser($val->role_id);
              }
          
         
        //return view('users.index',compact('users'))
            //->with('i', (request()->input('page', 1) - 1) * 5);

            return view('users.index',compact('users'));
      

       //return view('users');
    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
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
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

          

         ///////// mail send to user ////////
            
         //  //  /config/mail.php  add some code

           $name=$request->name;

           $email=$request->email;

            $password=$request->password;

            /*
            
            Mail::send('mail.login',array('name'=>$name,'email' => $email,'password' => $password),function($message) use ($name, $email)
        {
          
          $message->from('tmsadmin@gmail.com');
          $message->to($email, $name)->subject('TMS Login Details');
        });
           

           */
          
         ////////// end mail send to user ///////

        $user = User::create($request->only('email', 'name', 'role_id', 'password'));

         ////// change log file ////////
        

          $to_id=$user->id;
          $sub='User Created'; 
          $by_id=auth()->user()->id;

         $userChanged = User::changeUserLog($to_id,$sub,$by_id);

        //////// end change log file /////

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
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

         $user = User::findOrFail($id);


         $roles = Role::get();

         
 
         return view('users.edit', compact('user', 'roles'));
         
       
       
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
           
         $user = User::findOrFail($id);

         
        

      if(!empty($request->input('password'))) {
     $this->validate($request, [
           'name'=>'required|max:120',
           'email'=>'required|email|unique:users,email,'.$id,
           'password'=>'required|min:6|confirmed'
       ]);


       ///////// mail send to user ////////
            
         //  //  /config/mail.php  add some code

           $name=$request->name;

           $email=$request->email;

            $password=$request->password;

            $old_name=$user->name;
            $old_email=$user->email;

           
           /* 
            Mail::send('admin.mail.changelogin',array('name'=>$name,'old_name'=>$old_name,'email' => $email,'password' => $password),function($message) use ($old_name, $old_email)
        {
          
          $message->from('tmsadmin@gmail.com');
          $message->to($old_email, $old_name)->subject('TMS Login Details Changed');
        });
         
         */
         
         ////////// end mail send to user ///////

       $input = $request->only(['name', 'email', 'role_id', 'password','active']);
       }
       else
       {
         $this->validate($request, [
           'name'=>'required|max:120',
           'email'=>'required|email|unique:users,email,'.$id,
          // 'password'=>'required|min:6|confirmed'
       ]);

          ///////// mail send to user ////////
            
         //  //  /config/mail.php  add some code

           $name=$request->name;

           $email=$request->email;

            

            $old_name=$user->name;
            $old_email=$user->email;

          
            /*
            Mail::send('admin.mail.changelogin',array('name'=>$name,'old_name'=>$old_name,'email' => $email,'password' => ''),function($message) use ($old_name, $old_email)
        {
          
          $message->from('tmsadmin@gmail.com');
          $message->to($old_email, $old_name)->subject('TMS Login Details Changed');
        });
         
         */
          
         ////////// end mail send to user ///////

          $input = $request->only(['name', 'email', 'role_id','active']);  
       }

         ////// change log file ////////

          $to_id=$id;
          $sub='User Updated'; 
          $by_id=auth()->user()->id;

         $userChanged = User::changeUserLog($to_id,$sub,$by_id);

        //////// end change log file /////
        
       
        $user->fill($input)->save();

     
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
   

             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::findOrFail($id);
        $user->delete();

         ////// change log file ////////

          $to_id=$id;
          $sub='User Deleted'; 
          $by_id=auth()->user()->id;

         $userChanged = User::changeUserLog($to_id,$sub,$by_id);

        //////// end change log file /////

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully deleted.');
    }
}
