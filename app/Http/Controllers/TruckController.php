<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use App\Http\Requests\TruckApDeductionRequest;
use App\Http\Requests\TruckOtherDetailRequest;
use App\Http\Requests\TrucksRequest;
use App\Model\Driver;
use App\Model\Owner;
use App\Model\StatusTruck;
use App\Model\Terminal;
use App\Model\Truck;
use App\Model\TruckApDeduction;
use App\Model\TruckOtherDetail;
use App\Model\TruckTimeDeduction;
use App\Model\TruckUploadDocument;
use File;
use Illuminate\Http\Request;
use Image;

class TruckController extends Controller
{
    protected $truckId;

    public function __construct() 
    {
        $this->truckId = session()->get('truck_edit_id');
        // $this->truckId = 2;
    }

    public function index()
    {     
        session()->forget('truck_edit_id');
        $trucks = Truck::orderBy('id', 'desc')->get();
        /*print"<pre>";
        print_r($trucks);*/
        return view('truck/truck_list', ['trucks' => $trucks, 'Controller'=> $this ]);
    }

    public function basicInfo($id = '')
    {
        $owners = Owner::pluck('name', 'id')->toArray();
        $terminals = Terminal::pluck('name', 'id')->toArray();
        $arrDriver = Driver::pluck('dfname','id')->toArray();

    	return view('truck/basic_info', compact('owners', 'basicInfo', 'terminals', 'arrDriver'));
    }

    public function addBasicInfo( TrucksRequest $request )
    {
    	$objTruck = Truck::create($request->all());
        if(isset($objTruck->id)) {
            $request->session()->put('truck_insert_id', $objTruck->id);
        	$request->session()->put('truck_edit_id', $objTruck->id);

            TruckOtherDetail::create(['truck_id' => $objTruck->id]);
            TruckApDeduction::create(['truck_id' => $objTruck->id]);
            TruckTimeDeduction::create(['truck_id' => $objTruck->id]);

            return redirect('trucks/edit_other_detail/'.$objTruck->id)->with('success','Basic Info created successfully');
        } else {
            return back()->with('success','Something went wrong please try again');
        }
    }

    public function addOwner(OwnerRequest $request)
    {
        Owner::create($request->all());        
        return back()->with('success','Owner Created successfully');
    }

    public function otherDetail()
    {        
        if($this->truckId) {
		  return view('truck/other_detail');
        } else {
            return redirect('trucks')->with(array('error' => "You don't have  right to access" ));
        }
    }
    public function addOtherDetail( TruckOtherDetailRequest $request )
    {
    	TruckOtherDetail::create($request->all());
        return back()->with('success','Other Detail Created successfully');
    }

    public function apDeduction( Request $request )
    {

        if($this->truckId) {
            $truckInsertId = session()->get('truck_insert_id');
            $truckTimeDeductions = TruckTimeDeduction::where('truck_id', $truckInsertId)->get();
            return view('truck/ap_deduction', compact('truckTimeDeductions'));
        } else {
            return redirect('trucks')->with(array('error' => "You don't have  right to access" ));
        }
    }

    public function saveApDeduction( TruckApDeductionRequest $request )
    {
    	TruckApDeduction::create($request->all());
        return redirect('trucks/upload_documents')->with(array('success' => "Ap Deduction Created successfully" ));
    }

    public function oneTimeDeductions( Request $request )
    {
        $arrTimeDeducts = $request->all();        
        $int = count($arrTimeDeducts['deduction_type']);
        for ($i=0; $i < $int; $i++) { 
            $arr['truck_id'] = $arrTimeDeducts['truck_id'];
            $arr['deduction_type'] = $arrTimeDeducts['deduction_type'][$i];
            $arr['deduction_amount'] = $arrTimeDeducts['deduction_amount'][$i];
            $arr['deduction_comment'] = $arrTimeDeducts['deduction_comment'][$i];
            TruckTimeDeduction::create($arr);
        }
        return back()->with('success','One Time Deduction Created successfully');
    }

    public function uploadDocuments()
    {
            $truckId = session()->get('truck_edit_id');
        if($truckId) {
            $upload_document = TruckUploadDocument::where('truck_id', $truckId)->get();
            return view('truck/upload_documents', compact('upload_document'));
        } else {
            return redirect('trucks')->with(array('error' => "You don't have  right to access" ));
        }

    }

    public function saveDocuments( Request $request )
    {
        $this->validate($request, [
            'upload_doc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // print"<pre>";
        if ($request->hasFile('upload_doc')) {
            $photo = $request->file('upload_doc');

            $imagename = str_random(10).'.'.$photo->getClientOriginalExtension();
            $destinationImagePath = public_path() . '/uploads/trucks/'.$request->truck_id;

            if(\File::isDirectory($destinationImagePath)){

            } else {
              File::makeDirectory($destinationImagePath,0777,true);
            }
            $thumb_img = Image::make($photo->getRealPath());
          
            $thumb_img->save($destinationImagePath.'/'.$imagename,80);

            $fileItem = new TruckUploadDocument();
            $fileItem->truck_id = $request->truck_id;
            $fileItem->document_type = $request->document_type;  
            $fileItem->filename = $imagename;
            $fileItem->mime = $photo->getMimeType();
            $fileItem->save();
           return back()->with('success','Images Upload Success');
        }
    }

    public function deleteDocument($id)
    {
        $upload = TruckUploadDocument::find($id);        
        $upload->delete();
        $truckId = session()->get('truck_edit_id');
        unlink(public_path('uploads/trucks/'.$truckId.'/'.$upload->filename));
        return back()->with('success','Successfully has been delete File');
    }

    public static function getOwnerName($id)
    {
        $objOwner = Owner::find($id);
        return $objOwner->name;
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

    public function editBasicInfo( $id = '' )
    {
        if(!empty($id)) {
            session()->put('truck_edit_id', $id);
            $basicInfo = Truck::find($id);
            $owners = Owner::pluck('name', 'id')->toArray();
            $terminals = Terminal::pluck('name', 'id')->toArray();
            $arrDriver = Driver::pluck('dfname','id')->toArray();

            return view('truck/edit_basic_info', compact('owners', 'basicInfo', 'terminals', 'arrDriver'));            
        } else {
            return redirect('trucks');
        }
    }

    public function updateBasicInfo( TrucksRequest $request, $id )
    {
        Truck::find($id)->update($request->all());
        return redirect('trucks/edit_other_detail/'.$id)->with(array('success' => "Basic Info has been updated" ));
    }

    public function editOtherDetail( $id = '' )
    {
        if(!empty($id)) {
            $otherDetail = TruckOtherDetail::where('truck_id',$id)->get()->first();
            return view('truck/edit_other_detail', compact('otherDetail'));
        } else {
            return redirect('trucks');
        }
    }

    public function updateOtherDetail( TruckOtherDetailRequest $request, $id )
    {
        $request = request()->except('_token');
        TruckOtherDetail::where('truck_id',$id)->update($request);
        return redirect('trucks/edit_ap_deduction/'.$id)->with(array('success' => "Successfully Other Detail has been updated" ));
    }

    public function editApDeduction( $id = '' )
    {
        $apDeduction = TruckApDeduction::where('truck_id',$id)->get()->first();
        $truckTimeDeductions = TruckTimeDeduction::where('truck_id', $id)->get();
        return view('truck/edit_ap_deduction', compact('truckTimeDeductions', 'apDeduction'));
    }

    public function updateApDeduction( TruckApDeductionRequest $request, $id )
    {
        $request = request()->except('_token');
        TruckApDeduction::where('truck_id',$id)->update($request);
        return redirect('trucks/upload_documents')->with(array('success' => "Successfully Ap deduction has been updated" ));
    }

    public function updateOnetimedeductions( Request $request )
    {
        $intTruckId = $request->truck_id;
        if(!empty($intTruckId)) {
            TruckTimeDeduction::where('truck_id', $intTruckId)->delete();
        }

        $arrTimeDeducts = $request->all();
        $int = count($arrTimeDeducts['deduction_type']);
        for ($i=0; $i < $int; $i++) { 
            $arr['truck_id'] = $arrTimeDeducts['truck_id'];
            $arr['deduction_type'] = $arrTimeDeducts['deduction_type'][$i];
            $arr['deduction_amount'] = $arrTimeDeducts['deduction_amount'][$i];
            $arr['deduction_comment'] = $arrTimeDeducts['deduction_comment'][$i];
            TruckTimeDeduction::create($arr);
        }
        return back()->with('success','One Time Deduction Created successfully');
    }


    public function statusTruck( Request $request )
    {
        StatusTruck::where('truck_id', $request->truck_id)->delete();
        StatusTruck::create( $request->all() );
        return back()->with( 'success','Successfully has been saved!' );
    }

    public function getStatus($tId) 
    {
        $objStatus = StatusTruck::where('truck_id', $tId)->select('id', 'message', 'status')->first();
        if(!empty($objStatus)) {
            return $objStatus;
        }
    }

    public function getDriverName($id)
    {
        $arrDriver = Driver::find($id);
        return $arrDriver->dfname;
    }
}
