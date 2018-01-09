<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\GuardDetail;
use App\Model\TripLocation;
use App\Model\User;
use App\Model\Yard;
use Illuminate\Http\Request;

class YardController extends Controller
{

    public $deliver_id = 4;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $yards = Yard::all();

        return view('yards.index', ['yards'=>$yards, 'Controller'=>$this]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $guard = GuardDetail::pluck('name', 'id')->toArray();

         $gaurds = User::where('role_id',3)->pluck('name', 'id')->toArray();
       
        // return view('yards.create', compact('guard'));
        
        return view('yards.create',compact('gaurds'));
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
            
            'location_name'=>'required|max:120',
            'address'=>'required|max:120',
            'city'=>'required|max:120',
            'state'=>'required|max:120',
            'zip'=>'required|max:120',
            'phone'=>'required|max:120',
            'altphone'=>'required|max:120',
            'fax'=>'required|max:120',
            // 'guardid'=>'required|integer',
           
            ]
        );
//        print"<pre>";
//        print_r($request->all());
// die;
        $request['deliver_id'] = $this->deliver_id ;
        $request['order_id'] = 0 ;
        $request['trip_work_id'] = 0;
        $trip_locations = TripLocation::create($request->all());
        $location_name = $request['location_name']; 
        $request['trip_locations_id'] = $trip_locations->id;
        $yard = Yard::create($request->only('trip_locations_id','location_name', 'address', 'city', 'state', 'zip', 'phone', 'altphone', 'fax', 'guardid'));
       
       return redirect()->route('yards.index')
            ->with('flash_message',
             'Yard '.$location_name.' added!');
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
        $yard = Yard::findOrFail($id);
     $gaurds = User::where('role_id',3)->pluck('name', 'id')->toArray();
        return view('yards.edit', compact('yard','gaurds'));
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
         $yard = Yard::findOrFail($id);
        $this->validate($request, [
            
            'location_name'=>'required|max:120',
            'address'=>'required|max:120',
            'city'=>'required|max:120',
            'state'=>'required|max:120',
            'zip'=>'required|max:120',
            'phone'=>'required|max:120',
            'altphone'=>'required|max:120',
            'fax'=>'required|max:120',
            // 'guardid'=>'required|integer',
            ]
        );
            $id = $yard->trip_locations_id;
            TripLocation::find($id)->update( $request->all() );

            $input = $request->only(['location_name', 'address', 'city', 'state', 'zip', 'phone', 'altphone', 'fax', 'guardid']);

         $yard->fill($input)->save();
               
        return redirect()->route('yards.index')
            ->with('flash_message',
             'Yard '. $yard->location_name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $yard = Yard::findOrFail($id);
        $yard->delete();

        return redirect()->route('yards.index')
            ->with('flash_message',
             'Yard deleted!');
    }

     public function getGuardName($id)
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
}
