<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverFormW9Request;
use App\Http\Requests\DriverLicenseInsuranceInfo;
use App\Http\Requests\DriverRequest;
use App\Model\Driver;
use App\Model\DriverCheckList;
use App\Model\DriverFormw9;
use App\Model\DriverLicenceInsurance;
use App\Model\DriverUploadImage;
use App\Model\StatusDriver;
use App\Model\Terminal;
use App\Model\Truck;
use File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;

use App\Model\User;

use App\Model\Role;

use DB;

use Mail;

class DriverController extends Controller
{
    protected  $driverId;

    public  function __construct()
    {
        $this->driverId = session()->get('driver_edit_id');
    }

    public function index() 
    {   
        session()->forget('driver_edit_id');
        $arrDeiverDetail = Driver::with('DriverLicenceInsurance')->orderBy('id', 'desc')->get();
        return view('driver.index', ['driver_datas'=>$arrDeiverDetail, 'Controller'=>$this]);
    }

    /**
     * Show the form for creating a new Driver.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terminals = Terminal::pluck('name', 'id')->toArray();
    	return view('driver.basicinfo', compact('terminals'));
    }

    public function savebasicinfo(DriverRequest $request)
    {

    	$driver = Driver::create($request->all());
        $request->session()->put('driver_edit_id', $driver->id);
    	$request->session()->put('driver_id', $driver->id);

        DriverLicenceInsurance::create(['driver_id'=>$driver->id]);
        DriverFormw9::create(['driver_id'=>$driver->id]);
        DriverCheckList::create(['driver_id'=>$driver->id]);

        return redirect('driver/edit_licenceinfo/'.$driver->id)->with('success','Driver Data Inserted!');
    }

    public function editBasicInfo( $id = '' )
    {
        if(!empty($id)) {
            session()->put('driver_edit_id', $id);
            $basicInfo = Driver::find($id);
            $terminals = Terminal::pluck('name', 'id')->toArray();  ////// code for driver access login //////////

            $ud_val = DB::table('users_drivers')
             ->where('driver_id','=', $id)
             ->get(['user_id', 'driver_id'])
             ->first();

          if(count($ud_val)>0)
          {
              $user_id=$ud_val->user_id;
              $driver_id=$id;
           
          }else
          {
              $user_id='';
              $driver_id=$id;
          }

          

            //////// end code for driver access login /////
            return view('driver.edit_basicinfo', compact('basicInfo', 'terminals','user_id','driver_id'));   
        }else {
            return redirect('driver');
        }
    }


    public function updateBasicInfo( DriverRequest $request, $id )
    {
        Driver::find($id)->update($request->all());        
        return redirect('driver/edit_licenceinfo/'.$id)->with('success','Basic Info has been updated!');
    }


    public function showlicenceinfo()
    {
        if($this->driverId) {
   		   return view('driver.licenceInsurance');
        } else {
            return redirect('driver')->with(array('error' => "You don't have  right to access" ));
        }
	}

	public function savelicenceinfo(DriverLicenseInsuranceInfo $request)
    {
        $arrLicenceInfo = $request->all();
        if (isset($request->insurance_extra)) {
            $arrLicenceInfo['insurance_extra'] = serialize($request->insurance_extra);
        } else {
            $arrLicenceInfo['insurance_extra'] = '';
        }
        $request['cdlHaz'] = $request['cdlHaz'] ?? '';
        
		$arrDriverInsurence = DriverLicenceInsurance::create($arrLicenceInfo);
        return redirect( 'driver/formw9/')->with(array('success' => "Details has been saved!" ));
    }


    public function editLicenceInfo( $id = '' )
    {
        if(!empty($id)) {
            session()->put('driver_edit_id', $id);
            $driverLiceneInfo = DriverLicenceInsurance::where('driver_id', $id)->get()->first();
            return view('driver.edit_licenceInsurance', compact('driverLiceneInfo'));            
        } else {
            return redirect('driver');
        }
    }

    public function updateLicenceInfo( DriverLicenseInsuranceInfo $request, $id = '' )
    {
        $request = request()->except('_token');
        if(isset($request['insurance_extra'])) {
            $request['insurance_extra'] = serialize($request['insurance_extra']);
        } else {
            $request['insurance_extra'] = '';
        }
        $request['cdlHaz'] = $request['cdlHaz'] ?? '';

        
        $arrDriverInsurence = DriverLicenceInsurance::where('driver_id', $id)->update( $request );
        return redirect( 'driver/edit_formw9/'.$id )->with(array('success' => "Details has been saved!" ));
    }


    public function showformw9()
    {
        if($this->driverId) {
            return view('driver.formw9');
        } else {
            return redirect('driver')->with(array('error' => "You don't have  right to access" ));
        }
    }

    public function saveformw9( DriverFormW9Request $request )
    {
        DriverFormw9::create($request->all());
        return redirect( 'driver/checklist/' )->with(array('success' => "Details has been saved!" ));
    }


    public function showuploaddocuments()
    {
        $driver_id = session('driver_edit_id');        
        if($driver_id) {
            $upload_document = DriverUploadImage::where('driver_id','=',$driver_id)->get();
            return view('driver.uploadDocuments',compact('upload_document'));
        } else {
            return redirect('driver')->with(array('error' => "You don't have  right to access" ));
        }
        

    }

    public function saveuploaddocuments(Request $request)
    {
        $this->validate($request, [
           'upload_doc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
        $photo = $request->file('upload_doc');
        $imagename = str_random(10).'.'.$photo->getClientOriginalExtension(); 
        $destinationImagePath = public_path() . '/uploads/drivers/'.$request->driver_id;

        if(\File::isDirectory($destinationImagePath)){

        } else {

         File::makeDirectory($destinationImagePath,0777,true);
        }
        $thumb_img = Image::make($photo->getRealPath());
       
        $thumb_img->save($destinationImagePath.'/'.$imagename,80);
        $fileItem = new DriverUploadImage();
        $fileItem->driver_id = $request->driver_id;
        $fileItem->document_type = $request->document_type;  
        $fileItem->filename = $imagename;
        $fileItem->mime = $photo->getMimeType();
        $fileItem->save();
        return back()->with(array('success' => 'Images Upload Success'));
    }

    public function showchecklist()
    {
        if($this->driverId) {
            return view('driver.checkList');
        } else {
            return redirect('driver')->with(array('error' => "You don't have  right to access" ));
        }
        
    }

    public function savechecklist(Request $request)
    {   
        if (isset($request->attimeofhire)) {
            $attimeofhire = serialize($request->attimeofhire);
        } else {
            $attimeofhire = '';
        }
        $Dchecklist = new DriverCheckList();
        $Dchecklist->driver_id = $request->driver_id;
        $Dchecklist->check_list_data = $attimeofhire;
        $Dchecklist->save();
        return redirect( 'driver/uploaddocuments/' )->with(array('success' => "Details has been saved!" ));
    }

    public function editCheckList($id = '')
    {
        $arrCheckList = DriverCheckList::where('driver_id', $id)->get()->first();
        return view('driver.edit_checkList', compact('arrCheckList')); 
    }

    public function updateCheckList( Request $request , $id = '' )    
    {
        $request = request()->except('_token');
        if (isset($request['attimeofhire'])) {
            $request['check_list_data'] = serialize($request['attimeofhire']);
        } else {
            $request['check_list_data'] = '';
        }
        unset($request['attimeofhire']);
        DriverCheckList::where('driver_id', $id)->update($request);
        return redirect( 'driver/uploaddocuments' )->with(array('success' => "Details has been updated!" ));
    }

    
    public function deleteDocument($id)
    {
        $upload = DriverUploadImage::find($id);        
        $upload->delete();
        $driverId = session()->get('driver_edit_id');
        unlink(public_path('uploads/drivers/'.$driverId.'/'.$upload->filename));
        return back()->with('success','Successfully has been delete File');
    }


    public function getTerminalName($id)
    {
        $objTerminal = Terminal::find($id);
            $strTerminal = '';
        if($objTerminal) {
            $strTerminal = $objTerminal->name;
        } else {
            $strTerminal = "-";
        }
        return $strTerminal;
    }
    
    
    public function editFormw9( $id = '' )
    {
        if(!empty($id)) {
            $driverFormNine = DriverFormw9::where('driver_id', $id)->get()->first();
            return view('driver.edit_formw9', compact('driverFormNine'));            
        } else {
            return redirect('driver');
        }
    }

    public function updateFormw9( DriverFormW9Request $request, $id = '' )
    {
        $request = request()->except('_token');
        $driverFormWnine = DriverFormw9::where('driver_id', $id)->update($request);
        return redirect( 'driver/edit_checklist/'.$id )->with(array('success' => "Details has been updated" ));
    }

    public function statusDriver( Request $request )
    {
        StatusDriver::where('driver_id', $request->driver_id)->delete();
        StatusDriver::create( $request->all() );
        return back()->with( 'success','Successfully has been saved!' );
    }


    public function getStatus($tId) 
    {
        $objStatus = StatusDriver::where('driver_id', $tId)->select('id', 'message', 'status')->first();
        if(!empty($objStatus)) {
            return $objStatus;
        }
    }

    public function getTruck($id='')
    {
        $arrTruck = Truck::find($id);
        return $arrTruck->id ?? '';
    }

    // Driver Access


    public function addDriverLogin( $id = '' )
    {
        if(!empty($id)) {

            
        return view('driver.createdriverlogin');

        } else {
            return redirect('driver');
        }
    }

     public function storeDriverLogin(Request $request, $id)
     {
      

       $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

          

         ///////// mail send to user ////////
            
         //  //  /config/mail.php  add some code

       /*

           $name=$request->name;

           $email=$request->email;

            $password=$request->password;
            
            Mail::send('admin.mail.login',array('name'=>$name,'email' => $email,'password' => $password),function($message) use ($name, $email)
        {
          
          $message->from('tmsadmin@gmail.com');
          $message->to($email, $name)->subject('TMS Login Details');
        });
      
         */
          
         ////////// end mail send to user ///////

       

       // Request::merge(['role_id' => 2]);

        $user = User::create($request->only('email', 'name', 'password'));
        
      
            DB::table('users')
            ->where('id', $user->id)
            ->update(array('role_id' => 2));  // add driver id here to assingn driver role

            ////// insert data in users_drivers table /////

            DB::table('users_drivers')->insert(
              ['user_id' => $user->id, 'driver_id' => $id]
             );

            //////// end insert data in users_drivers table //

             ////// change log file ////////

          $to_id=$user->id;
          $sub='User Created'; 
          $by_id=auth()->user()->id;

         $userChanged = User::changeUserLog($to_id,$sub,$by_id);

        //////// end change log file /////

          return redirect('driver/edit_basicinfo/'.$id)->with('success','Driver successfully added.!');

       

     }


     public function editDriverLogin( $id = '',$did = '' )
    {
      
        if(!empty($id)) {


            $user = User::findOrFail($id);


            ///////// find user log history ////

          $user_log = DB::table('users_log')
         ->where('to_id','=', $id)->limit(10)
         ->get(['id', 'to_id', 'action_desc','by_id','by_email','change_date']);

            /////// end find user log history /////


         return view('driver.editdriverlogin', compact('user','user_log','did'));

            
               } else {
            return redirect('driver');
        }
    }


    public function updateDriverLogin(Request $request, $id)
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

       $input = $request->only(['name', 'email','password','active']);
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

          $input = $request->only(['name', 'email', 'active']);  
       }

         
          ////// change log file ////////

          $to_id=$id;
          $sub='User Updated'; 
          $by_id=auth()->user()->id;

         $userChanged = User::changeUserLog($to_id,$sub,$by_id);

        //////// end change log file /////
       
        $user->fill($input)->save();

       return redirect('driver/edit_basicinfo/'.$request->input('driver_id'))->with('success','Driver successfully updated.!');

      
   

             
    }




}
