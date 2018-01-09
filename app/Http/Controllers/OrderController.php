<?php
	namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
	use App\Model\Driver;
	use App\Model\OrderTripDetail;
	use App\Model\Truck;
	use App\Http\Requests\OrderChargeRequest;
	use App\Model\TripLocation;
	use App\Model\TripWorkLocation;
	use App\Http\Requests\OrderBasicRequest;
	use App\Http\Requests\OrderLocationRequest;
	use App\Model\OrderBasic;
	use App\Model\OrderLocation;
	use App\Model\WorkOnLocation;
	use App\Http\Controllers\Controller;
	use App\Model\OrderCharge;
	use App\Model\Terminal;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;

	use App\Model\Role;


	class OrderController extends Controller
	{
		public $order_id;

		public function __construct()
		{
			$this->order_id = session()->get('order_edit_id');
		}

	    public function index()
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

        	session()->forget('order_edit_id');

        	////////// check if user is driver  /////////


             
             if(Auth::user()->role_id==2)
             	{
             
           DB::enableQueryLog();


           $arrOrders = DB::table('order_basics')
    ->whereIn('id', function($query)
    {
         $query->select(DB::raw('order_trip_details.order_id'))
                        ->from('order_trip_details')
                        ->join ('users_drivers', 'users_drivers.driver_id', '=', 'order_trip_details.driver_id')
                        ->where('users_drivers.user_id','=', Auth::user()->id);
        

        })
        ->get();

             	}
                else
                {
        	/////// end check if user is driver ////

	    	$arrOrders = OrderBasic::orderBy('id', 'desc')->get();
	    	   }



			return view('orders.index', ['arrOrders' => $arrOrders, 'Controller' => $this]);
	    }

	    public function basicInfo() 
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
       

	    	$arrCustomers = $this->getAllCustomers();
	    	$terminal = Terminal::all()->pluck('name','id');
	    	return view('orders.basicinfo', compact('terminal','arrCustomers'));
	    }

	    public function savebasicinfo(OrderBasicRequest $request){
	    	$arrBasicInfo = $request->all();		    	
		    if(isset($request->load_weight_other)) {
		        $arrBasicInfo['load_weight_other'] = serialize($request->load_weight_other);
		    } else {
		    	$arrBasicInfo['load_weight_other'] = '';
		    }
		    
			if(isset($arrBasicInfo['container_chassis'])) {
		    	$arrBasicInfo['container_chassis'] = serialize($arrBasicInfo['container_chassis']);
			} else {
				$arrBasicInfo['container_chassis'] = '';
			}

	       	$objOrder = OrderBasic::create($arrBasicInfo);
	       	$request->session()->put('order_edit_id', $objOrder->id);
	        if(isset($objOrder->id)) {
	           $request->session()->put('order_insert_id', $objOrder->id);
	           $request->session()->put('order_edit_id', $objOrder->id);
	           return redirect('/order/location')->with('success','Basic Info created successfully');
	        } else {
	           return back()->with('success','Something went wrong please try again');
	        }
		}

		public function editBasicinfo( Request $request, $id = '' )
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

	    	$arrCustomers = $this->getAllCustomers();
			$orderBasicInfo = OrderBasic::find($id);
			$terminal = Terminal::all()->pluck('name','id');
			$request->session()->put('order_edit_id', $id);
			return view('orders.edit_basicinfo', compact('orderBasicInfo', 'terminal','arrCustomers'));
		}

		public function updateBasicinfo( OrderBasicRequest $request, $id = '' )
		{
			$arrBasicInfo = $request->all();		    	
		    if(isset($request->load_weight_other)) {
		        $arrBasicInfo['load_weight_other'] = serialize($request->load_weight_other);
		    } else {
		    	$arrBasicInfo['load_weight_other'] = '';
		    }

		    if(isset($arrBasicInfo['container_chassis'])) {
		    	$arrBasicInfo['container_chassis'] = serialize($arrBasicInfo['container_chassis']);
			} else {
				$arrBasicInfo['container_chassis'] = '';
			}

			OrderBasic::find($id)->update( $arrBasicInfo );
			return redirect('/order/location')->with('success','Basic Info has been updated!');
		}


		public function searchCustomerResponse(Request $request){  
        $query = $request->get('term','');
        $customers=\DB::table('customers');
         if($request->type=='customername'){
            $customers->where('full_name','LIKE','%'.$query.'%');
        }
        
       

           $customers=$customers->get();        
        $data=array();
        foreach ($customers as $customer) {
                $data[]=array('customerfield'=>$customer->full_name);
        }
        if(count($data))
             return $data;
        else
            return '';
    }

	    public function showlocationform()
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
 

	    	$orderId =  session('order_edit_id');
	    	if(!empty($orderId)):
	       	$basicLocation = OrderBasic::find($orderId)->first();
	       	$addedLocation = OrderLocation::where('order_id','=',$orderId)->get();
	       	$work_on_locations = WorkOnLocation::where('show_on_order','=', 1 )->get();
	        return  view('orders.location',['basicLocation'=>$basicLocation,'addedLocation' => $addedLocation, 'work_on_locations' => $work_on_locations, 'Controller' => $this]);
	        else:
            	return redirect('/order')->with(array('error' => "You don't have  right to access" ));
	    	endif;

	    }

	    public function showchargeform()
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

	    	$order_id = session('order_edit_id');
	    	if(!empty($order_id)):
	          	$order_charge = OrderCharge::where('order_id','=',$order_id )->get();
		    	return  view('orders.charge',compact('order_charge'));
	    	else:
            	return redirect('/order')->with(array('error' => "You don't have  right to access" ));
	    	endif;
	    }

	    public function showtripsform(){

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


	       $order_id = session('order_edit_id');
	       if(!empty($order_id)):
		      	 $basicLocation = OrderBasic::find($order_id)->first();

		       $addedLocation = TripWorkLocation::where('order_id',$order_id)->orderBy('trip_order', 'asc')->select('id', 'trip_order')->get()->toArray();
		       // pre($addedLocation);
		       $work_on_locations = WorkOnLocation::all()->pluck('work_name','id')->toArray();

	         
		       $selectedOrderLocation = TripWorkLocation::orderBy('trip_order')->where('order_id', $order_id)->pluck('trip_work_id')->toArray();

		        $selectedTripLocationId = TripWorkLocation::orderBy('trip_order')->where('order_id', $order_id)->pluck('trip_location_id')->toArray();
		        
		        $arrCurtDriver = DB::table('trucks')->pluck('current_driver')->toArray();
		        $arrDrivers = DB::table('drivers')->whereIn('id', $arrCurtDriver)->pluck('id', DB::raw('concat(dfname, " ", dlname) as fullname'))->toArray();
		        $arrDrivers = array_flip($arrDrivers);
		        $arrDrivers = ['0'=>'Select One']  + $arrDrivers;
		        $arrTripDetails = OrderTripDetail::where('order_id', $order_id)->get();

		       return view('orders.trips',['basicLocation' => $basicLocation,'addedLocation'=>$addedLocation,'work_on_locations'=>$work_on_locations, 'selectedOrderLocation'=>$selectedOrderLocation,'selectedTripLocationId'=>$selectedTripLocationId, 'drivers' => $arrDrivers, 'arrTripDetails'=>$arrTripDetails, 'Controller'=>$this]);	
		       else:
            	return redirect('/order')->with(array('error' => "You don't have  right to access" ));
	    	endif;

	    }

	    public function getTripLocation($id)
	    {	
	    	$arrTrip = TripLocation::where('order_id', $this->order_id)->select('deliver_id')->groupBy('deliver_id')->get()->toArray();
	    	
	    	$stripTripLocation = TripLocation::where('id',$id)->pluck('id', DB::raw('concat(address, ", ", city, ", ",state, ", ", zip ) as fulllocation'))->toArray();	    	
	    	return array_flip($stripTripLocation);
	    	
	    }


	    public function getTripWorkbyOrder($id,$trip_work_id)
	    {
	    	$arrWorkLoctId = $this->getAllWorkYardloct();
	    	if(in_array($trip_work_id, $arrWorkLoctId)) {
	         	$arrTrip = TripLocation::where('order_id',0)->pluck('id', DB::raw('concat(address, ", ", city, ", ",state, ", ", zip ) as fulllocation'))->toArray();	
		    	return array_flip($arrTrip);
	    	} else {
	    		$arrTrip = TripLocation::where('order_id',$id)->where('trip_work_id',$trip_work_id)->pluck('id', DB::raw('concat(address, ", ", city, ", ",state, ", ", zip ) as fulllocation'))->toArray();	
		    	return array_flip($arrTrip);
	    	}
	    }


	    private function getAllWorkYardloct()
	    {
			$arrWorkLocation = WorkOnLocation::where('show_on_order', 0)->pluck('id')->toArray();
			return ($arrWorkLocation) ?? [];
	    }

	    public function showimagingform()
	    {
	    	$upload_document = [];
	    	return view('orders.imaging', compact('upload_document'));
	    }

	    public function saveLocation(OrderLocationRequest $request) {

	    	$arrTripLocation = ['deliver_id'=>$request['doing_in_location'],'order_id'=>$request['order_id'],'trip_work_id'=> $request['doing_in_location'],'location_name' => $request['location_name'],'address'=>$request['address'], 'city'=> $request['city'], 'state'=>$request['state'], 'zip' => $request['zip'] ];

	    	$intTripLocationId = DB::table('trip_locations')->insertGetId( $arrTripLocation );

	    	$request = $request->all();

	    	$request['trip_location_id'] = $intTripLocationId;

	    	unset($request['location_name'],$request['address'], $request['city'], $request['state'], $request['zip']);

	        $orderLocation = OrderLocation::create($request);

	        $intOrdId = $this->lastOrderTripDetl();

	        TripWorkLocation::insert(['order_id'=>$request['order_id'], 'trip_work_id'=> $request['doing_in_location'], 'trip_location_id'=> $request['doing_in_location'],  'trip_order' => $intOrdId+1]);
	        return back()->with('success','Location Added Successfully');
	    }

	    public function saveCharge(OrderChargeRequest $request){
	        OrderCharge::create($request->all());
	        return back()->with('success','Order Charge Added Successfully');
	    }

	    public function getDeliverLocation( Request $request ) 
	    {
	    	$strCustId = $request->strId;
	    	$arrWorkLoctId = $this->getAllWorkYardloct();
	    	
	    	$orderId = session('order_edit_id');
	    		$arrTrip = [];
	    	if(in_array($strCustId, $arrWorkLoctId)) {

	         	$arrTrip = TripLocation::where('order_id',0)->pluck('id', DB::raw('concat(address, ", ", city, ", ",state, ", ", zip ) as fulllocation'))->toArray();	
	    	} else {
	    		$arrTrip = TripLocation::where('order_id',$orderId)->where('trip_work_id',$strCustId)->pluck('id', DB::raw('concat(address, ", ", city, ", ",state, ", ", zip ) as fulllocation'))->toArray();	
	    	}
			$arrTrip = array_flip($arrTrip);
	    	return json_encode($arrTrip);
	    }

	    public function getLocationWork($id)
	    {
	    	$arrLocation = WorkOnLocation::find($id);
	    	return $arrLocation->work_name;
	    }

	    public function savetrips(Request $request){
		   $arrTrips = request()->except('_token');
		   $arrTrips['payment_details'] =  serialize($arrTrips['payment_details']);
		   $checkOrderTripExist = $this->checkOrderTripExist($arrTrips['trip_no']);
		   // pre($arrTrips);
		   if(!empty($checkOrderTripExist)) {
		   		OrderTripDetail::where('trip_no', $arrTrips['trip_no'])->update( $arrTrips );
		   } else {
		   		OrderTripDetail::create($arrTrips);
		   }
       	   return back()->with('success','Order trip details Created successfully');
   		}

   		public function checkOrderTripExist($id)
   		{
   			$arrTripDetl = OrderTripDetail::where('trip_no', $id)->get()->first();
   			print_r($arrTripDetl);
			if (!empty($arrTripDetl->driver_id)) {
   				return true;
   			}   		 	
   		}

   		public function getRowTripLocation($id)
   		{
			$arrTripLocation = TripLocation::where('id', $id)->get()->first();
			return $arrTripLocation;
   		}

   		public function getTruckByDriver( Request $request )
   		{	
   			$intrDriverId = $request['driverId'];
   			$arrTrucks = Truck::select('id')->where('current_driver', $intrDriverId)->get()->toArray();
   			$arrTruck = [];
   			foreach($arrTrucks as $Key => $truckId) {
				$arrTruck[] = $this->getTruckDetails($truckId['id']);
   			}
   			return $arrTruck;
   		}

   		public function getTruckDetails($id)
   		{
			return Truck::where('id', $id)->get()->first()->toArray();
   		}

   		public function getOrderTripDetail( Request $request )
   		{
   			$strId = $request->strTripId;
   			$arrTripDetl = OrderTripDetail::where('trip_no', $strId)->get()->first();
   				$jsonTrip = [];
   			if(!empty($arrTripDetl)) {
   				$jsonTrip = $arrTripDetl->toArray();
				$jsonTrip['payment_details'] = $this->serializeToJson($jsonTrip['payment_details']);
   				$jsonTrip['trucks'] = json_encode($this->getAllTrucksByDriver($arrTripDetl->driver_id));
   			}
   			// print_r($jsonTrip);
   			return $jsonTrip;
   		}

   		public function serializeToJson($data)
   		{
   			$srilze = unserialize($data);
   				$newArray = [];
   			foreach ($srilze['pay_type'] as  $strKey => $strValue) {
				foreach ($srilze as $key => $value) {
					$newArray[$strKey][$key] = $value[$strKey];
				}
			}
			return json_encode($newArray);
   		}

   		public function getAllTrucksByDriver( $id ) 
   		{
   			$arrTrucks = Truck::select('id')->where( 'current_driver', $id )->get()->toArray();
   			$arrTruck = [];
   			foreach($arrTrucks as $Key => $truckId) {
				$arrTruck[] = $this->getTruckDetails($truckId['id']);
   			}
   			return $arrTruck;
   		}

   		public function saveTripOrderData( Request $request )
   		{


   			$orderId = session('order_edit_id');
   			$request = request()->except('_token');

   				$newArray = [];
			foreach ($request['trip_work'] as  $strKey => $strValue) {
				foreach ($request as $key => $value) {
					$newArray[$strKey][$key] = ($value[$strKey]) ?? 0;
				}
			}

				$newInsetId = [];
			foreach ($newArray as $key => $value) {
				if(empty($value['trip_order'])) {
					$newInsetId = $key;
				}
			}

			$ij = 0;
			$adff = [];
			foreach($newArray as $key => $value) {
				$newOrderId = $ij+1;
				if($key >= $newInsetId) {
					$adff[] = array_replace($value, ['trip_order'=>$newOrderId]);
				} else {
					$adff[] = $value;
				}
				$ij++;
			}

			foreach ($adff as $key => $value) {
				$strTripId = ($value['trip_id']) ?? '';
				$strTripWork = ($value['trip_work']) ?? '';
				$strTripLocation = ($value['trip_location']) ?? '';
				$strTripOrder = ($value['trip_order']) ?? '';

				if(!empty($strTripId)) {
					TripWorkLocation::where('id', $strTripId)->update(["trip_work_id"=>$strTripWork, "trip_location_id"=>$strTripLocation,"trip_order"=>$strTripOrder]);	
				} else {
					TripWorkLocation::insert(["order_id"=>$orderId,"trip_work_id"=>$strTripWork, "trip_location_id"=>$strTripLocation,"trip_order"=>$strTripOrder]);
				}
			}
   		}




   		public function lastOrderTripDetl() 
   		{
   			$orderId = session('order_edit_id');
   			$instId = TripWorkLocation::orderBy('id', 'desc')->where('order_id', $orderId)->pluck('trip_order')->first();
   			return ($instId) ?? '0';
		}

		public function delOrderTripDetl( Request $request )
		{	
			$intId = $request->id;
		    $tripWorkLocation = TripWorkLocation::find($intId);
		    $deleted = $tripWorkLocation->delete();
		    if($deleted) {
		    	return 1;
		    }
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


	    public function checkdispatch(Request $request )
		    {
		    	$order_id = $request->id;

             ////////// check if user is driver  /////////
                if(Auth::user()->role_id==2)
             	{
             		
                $arrTripDetails = DB::table('order_trip_details')
                ->whereIn('driver_id',function($query) use ($order_id)
                {
                $query->select(DB::raw('driver_id'))
                ->from('users_drivers')
                ->whereRaw('(order_trip_details.order_id ='.$order_id.') AND (users_drivers.user_id ='.Auth::user()->id.')');
                })
                ->get();

                }
                else
                {
                $arrTripDetails = OrderTripDetail::where('order_id', $order_id)->get();
                }
                             
		    					
				return view('orders.dispatch' , ['Controller' => $this, 'arrTripDetails' => $arrTripDetails]);

		    }

		public function dispatchSave(Request $request){
			$request['dispatch_by'] = Auth::id();
			$trip_id = $request->id;
			$arrTripDetails = OrderTripDetail::find($trip_id)->update($request->all());

		}
		public function tripWorkLocations($id){

			return TripWorkLocation::where('id', $id)->get()->first()->toArray();
			
		}
		public function workOnLocations($id){
			return WorkOnLocation::where('id',$id)->pluck('work_name')->first();
			
		}

		public function getDriverName($id){
			return Driver::where('id',$id)->select('dfname','dlname')->get()->first()->toArray();
			
		}
		public function getTruckLicencePlate($id){

			return Truck::where('id',$id)->pluck('license_plate_no')->first();
			
		}


		public function getDriverNameByTruckId($id){
			return Driver::where('id',$id)->select('dfname','dlname')->get()->first()->toArray();
			
		}
		

		public function checkcomplete(Request $request )
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
         elseif(empty(cheakAcl(str_replace('?',$request->id,$aclrole[Auth::user()->role_id]))))  
         {
          
          return back()->with(array('error' => 'You don\'t have right to access'));

         }

        //////////// end check access permission //////////

		  $order_id = $request->id;

            ////////// check if user is driver  /////////
            if(Auth::user()->role_id==2)
             	{

                // $arrTripDetails = OrderTripDetail::where('order_id', $order_id)->get();

                $arrTripDetails = DB::table('order_trip_details')
                ->whereIn('driver_id',function($query) use ($order_id)
                {
                $query->select(DB::raw('driver_id'))
                ->from('users_drivers')
                ->whereRaw('(order_trip_details.order_id ='.$order_id.') AND (users_drivers.user_id ='.Auth::user()->id.')');
                })
                ->get();

             	}
             	else
             	{

             	$arrTripDetails = OrderTripDetail::where('order_id', $order_id)->get();	
             	}
						
				return view('orders.complete' , ['Controller' => $this, 'arrTripDetails' => $arrTripDetails]);

		 }
		 public function completedSave(Request $request){
			$request['completed_by'] = Auth::id();		 	
			$trip_id = $request->id;
			$arrTripDetails = OrderTripDetail::find($trip_id)->update($request->all());

		}

		public function getUserName($id)
   		{ 
	        $objUser = User::find($id);
	            $strUser = '';
	        if($objUser) {
	            $strUser = $objUser->name;
	        } else {
	            $strUser = "-";
	        }
       	 return $strUser;
    	}


    public function getAllCustomers()
	{
		$arrAllCustomers = Customer::with('contactAddress')->get()->toArray();
			$arrCustomers = [];
		foreach ($arrAllCustomers as $key => $arrCustomer) {
			$strCustName = ($arrCustomer['full_name']) ?? '';
			$strCustAddress = !empty($arrCustomer['contact_address']['address1']) ? ', '.$arrCustomer['contact_address']['address1'] : '';
			$arrCustomers[$arrCustomer['id']] = $strCustName . $strCustAddress;
		}

		if(!empty($arrCustomers)) {
			return $arrCustomers;
		}
	}

	public function getOneCustomer($id)
	{
		$arrCustomer = Customer::where('id', $id)->get()->first()->toArray();
		if(!empty($arrCustomer)) {
			return $arrCustomer;
		}
	}

	

	public function dispatchedlist()
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

        	session()->forget('order_edit_id');
           //DB::enableQueryLog();

        	////////// check if user is driver  /////////
            if(Auth::user()->role_id==2)
             	{
             

              $arrOrders = DB::table('order_basics')
              ->whereIn('id', function($query)
              {
         $query->select(DB::raw('order_trip_details.order_id'))
                        ->from('order_trip_details')
                        ->join ('users_drivers', 'users_drivers.driver_id', '=', 'order_trip_details.driver_id')
                       // ->where('users_drivers.user_id','=', Auth::user()->id);
                       ->whereRaw('(order_trip_details.dispatch_by IS NOT NULL OR order_trip_details.dispatch_by<>"") AND (order_trip_details.completed_by IS  NULL OR order_trip_details.completed_by="") AND (users_drivers.user_id='.Auth::user()->id.') ');

        })
        ->get();

             	}
             	else
             	{
	    	$arrOrders = DB::table('order_basics')
    ->whereIn('id', function($query)
    {
         $query->select(DB::raw('order_id'))
              ->from('order_trip_details')
              ->whereRaw('(order_trip_details.dispatch_by IS NOT NULL OR order_trip_details.dispatch_by<>"") AND (order_trip_details.completed_by IS  NULL OR order_trip_details.completed_by="")');
        })
        ->get();

    }

//dd(DB::getQueryLog());
			return view('orders.dispatchedlist', ['arrOrders' => $arrOrders, 'Controller' => $this]);
	    }

	public function completedlist()
	    {

	    	

     //DB::enableQueryLog();

	    	////////// check if user is driver  /////////
            if(Auth::user()->role_id==2)
             	{

             $arrOrders = DB::table('order_basics')
              ->whereIn('id', function($query)
              {
         $query->select(DB::raw('order_trip_details.order_id'))
                        ->from('order_trip_details')
                        ->join ('users_drivers', 'users_drivers.driver_id', '=', 'order_trip_details.driver_id')
                       // ->where('users_drivers.user_id','=', Auth::user()->id);
                       ->whereRaw('(order_trip_details.completed_by IS NOT NULL OR order_trip_details.completed_by<>"") AND (users_drivers.user_id='.Auth::user()->id.') ');
                       })
               ->get();		

             	}
             	else
             	{

	    	 $arrOrders = DB::table('order_basics')
    ->whereIn('id', function($query)
    {
         $query->select(DB::raw('order_id'))
              ->from('order_trip_details')
              ->whereRaw('(order_trip_details.completed_by IS NOT NULL OR order_trip_details.completed_by<>"")');
        })
        ->get();

    }
        
        //dd(DB::getQueryLog());
           
           // echo print_r($arrOrders); die;
        	session()->forget('order_edit_id');
	    	
			return view('orders.completedlist', ['arrOrders' => $arrOrders, 'Controller' => $this]);
	    }

}
