<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerBillDetailRequest;
use App\Http\Requests\CustomerBillOthrDetlRequst;
use App\Http\Requests\CustomerContactRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerSetUpEmailNotification;
use App\Model\Customer;
use App\Model\CustomerBillingDetail;
use App\Model\CustomerBillingOtherDetail;
use App\Model\CustomerContactDetail;
use App\Model\CustomerSetUpEmail;
use App\Model\CustomerUploadImage;
use App\Model\StatusCustomer;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class CustomerController extends Controller
{
    protected  $customerId;

    public function __construct()
    {
        $this->customerId = session()->get('customer_edit_id');
    }

    public function index()
    {
        session()->forget('customer_edit_id');
        $arrCustomers = Customer::orderBy('id', 'desc')->get();

        return view('customer.index', ['arrCustomers'=>$arrCustomers, 'Controller'=>$this]);
    }

    public function basicInfo() 
    {
    	return view('customer.basicInfo');
    }

    public function saveBasicInfo( CustomerRequest $request )
    {   
        $customer = Customer::create($request->all());
        $request->session()->put('customer_edit_id', $customer->id);

        CustomerContactDetail::create(['customer_id' => $customer->id]);
        CustomerBillingDetail::create(['customer_id' => $customer->id]);
        CustomerBillingOtherDetail::create(['customer_id' => $customer->id]);
        CustomerSetUpEmail::create(['customer_id' => $customer->id]);

        return redirect('customer/edit_address_contact/'.$customer->id)->with('success','Basic Info created successfully');
    }

    public function addressContact()
    {
        if($this->customerId) {
    	   return view('customer.address_contact');
        } else {
            return redirect('customer')->with(array('error' => "You don't have  right to access" ));
        }
    }

    public function saveAddressContact( CustomerContactRequest $request )
    {
        CustomerContactDetail::create($request->all());
        return redirect('customer/billing_details/')->with('success','Details has been saved!');
    }

    public function billingDetails()
    {
        if($this->customerId) {
    	   return view('customer.billing_details');
        } else {
            return redirect('customer')->with(array('error' => "You don't have  right to access" ));
        }
    }

    public function saveBillingDetail( CustomerBillDetailRequest $request )
    {
        CustomerBillingDetail::create($request->all());
        return redirect('customer/set_customer_email/')->with('success','Details has been saved!');
    }

    public function customerImaging()
    {
            $customer_id = session('customer_edit_id');

        if($customer_id) {
            $upload_document = CustomerUploadImage::where('customer_id','=',$customer_id)->get();
        	return view('customer.imaging', compact('upload_document'));
        } else {
            return redirect('customer')->with(array('error' => "You don't have  right to access" ));
        }
    }

    public function saveUploadDocuments( Request $request )
    {
        $validatedData = $request->validate([
        'upload_doc' => 'required|mimes:jpg,jpeg,png,pdf,txt,doc'
          ]);
        $photo = $request->file('upload_doc');
        $imagename = str_random(10).'.'.$photo->getClientOriginalExtension(); 
        $destinationImagePath = public_path() . '/uploads/customers/'.$request->customer_id;

        if(\File::isDirectory($destinationImagePath)){

        } else {

         File::makeDirectory($destinationImagePath,0777,true);
        }
        $thumb_img = Image::make($photo->getRealPath());
       
        $thumb_img->save($destinationImagePath.'/'.$imagename,80);
        $fileItem = new CustomerUploadImage();
        $fileItem->customer_id = $request->customer_id;
        $fileItem->document_type = $request->document_type;  
        $fileItem->filename = $imagename;
        $fileItem->mime = $photo->getMimeType();
        $fileItem->save();
        return back()->with(array('success' => 'Images Upload Success'));
    }

    public function saveBillingOtherDetail( CustomerBillOthrDetlRequst $request )
    {   
        $request = $request->all();
        if(isset($request['attach_these'])) {
            $request['attach_these'] =  serialize($request['attach_these']);
        } else {
            $request['attach_these'] = '';
        }
        CustomerBillingOtherDetail::create( $request );
        return redirect('customer/set_customer_email/')->with('success','Basic Info created successfully');
    }

    public function deleteDocument($id = '')
    {
        $upload = CustomerUploadImage::find($id);        
        $upload->delete();
        $customerId = session()->get('customer_edit_id');
        unlink(public_path('uploads/customers/'.$customerId.'/'.$upload->filename));
        return back()->with('success','Details has been delete File');
    }


    public function editBasicInfo( Request $request, $id = '' )
    {
        if(!empty($id)) {
            session()->put('customer_edit_id', $id);
            $basicInfo = Customer::find($id);
            return view('customer.edit_basicinfo', compact('basicInfo'));
        } else {
            return redirect('customer');
        }
        
    }

    public function updateBasicInfo( CustomerRequest $request, $id='' )
    {
        Customer::find($id)->update( $request->all() );
        return redirect('customer/edit_address_contact/'.$id)->with('success','Basic Info has been updated!');
    }   

    public function editAddressContact( Request $request, $id = '' ) 
    {
        if(!empty($id)) {
            $CustomerContDetl = CustomerContactDetail::where('customer_id',$id)->get()->first();
            return view('customer.edit_address_contact', compact('CustomerContDetl'));
        } else {
            return redirect('customer');
        }
    }

    public function updateAddressContact( CustomerContactRequest $request, $id='' )
    {
        $request = request()->except('_token');
        CustomerContactDetail::where('customer_id', $id)->update( $request );
        return redirect('customer/edit_billing_details/'.$id)->with('success','Details has been updated');
    }

    public function editBillingDetails( Request $request, $id = '' )
    {
        if(!empty($id)) {
            $billingDetails = CustomerBillingDetail::where('customer_id',$id)->get()->first();
            $billingOtherDetails = CustomerBillingOtherDetail::where('customer_id',$id)->get()->first();
            return view('customer.edit_billing_details', compact('billingDetails', 'billingOtherDetails'));
        } else {
            return redirect('customer');
        }
    }

    public function updateBillingDetails( CustomerBillDetailRequest $request, $id='' )
    {
        $request = request()->except('_token');
        CustomerBillingDetail::where('customer_id', $id)->update( $request );
        return back()->with(array('success' => 'Details has been  updated'));
    }

    public function updateBillingOtherDetails(  CustomerBillOthrDetlRequst $request, $id = '' )
    {
        $request = request()->except('_token');
        if(isset($request['attach_these'])) {
            $request['attach_these'] =  serialize($request['attach_these']);
        } else {
            $request['attach_these'] = '';
        }
        CustomerBillingOtherDetail::where('customer_id', $id)->update( $request );
        return redirect('customer/edit_set_customer_email/'.$id)->with('success','Details has been  updated');
    }


    public function statusCustomer( Request $request )
    {
        StatusCustomer::where('customer_id', $request->customer_id)->delete();
        StatusCustomer::create( $request->all() );
        return back()->with( 'success','Details has been saved!' );
    }


    public function getStatus($tId) 
    {
        $objStatus = StatusCustomer::where('customer_id', $tId)->select('id', 'message', 'status')->first();
        if(!empty($objStatus)) {
            return $objStatus;
        }
    }

    public function getCustomAjaxDetail( Request $request )
    {
        $strCustId = $request->strCustId;
        $CustomerContDetl = CustomerContactDetail::where('customer_id',$strCustId)->get()->first()->toJson();
        return $CustomerContDetl;
    }

    public function getSetupCustomerEmail()
    {
        if($this->customerId) {
            return view('customer.setup_customer_email');
        } else {
            return redirect('customer')->with(array('error' => "You don't have  right to access" ));
        }
    }

    public function saveSetupCustomerEmail( CustomerSetUpEmailNotification $request )
    {
        $request = $request->all();
        if(isset($request['inline_checkbox'])) {
            $request['inline_checkbox'] = serialize($request['inline_checkbox']);
        } else {
            $request['inline_checkbox'] = '';
        }
        CustomerSetUpEmail::create($request);
        return redirect('customer/customer_imaging/')->with('success','Details has been  updated');
    }

    public function getUpdateSetupCustomerEmail($id = '')
    {
        if(!empty($id)) {
            $customerEmail = CustomerSetUpEmail::where('customer_id', $id)->get()->first();
            return view('customer.edit_setup_customer_email', compact('customerEmail'));
        } else {
            return redirect('customer');            
        }
    }

    public function updateSetupCustomerEmail( CustomerSetUpEmailNotification $request, $id = '' )
    {
        $request = request()->except('_token'); 
        if(isset($request['inline_checkbox'])) {
            $request['inline_checkbox'] = serialize($request['inline_checkbox']);
        } else {
            $request['inline_checkbox'] = '';
        }
        // print_r($request);
        CustomerSetUpEmail::where('customer_id', $id)->update( $request );
        return redirect('customer/customer_imaging')->with('success','Details has been  updated');
    }
}
