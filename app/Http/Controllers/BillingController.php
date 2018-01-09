<?php
namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Model\Billing;
use App\Model\Customer;
use App\Model\OrderBasic;
use App\Model\OrderCharge;
use App\Model\Terminal;
use App\Model\User;
use Illuminate\Http\Request;
use PDF;

class BillingController extends Controller
{
    public function index()
    {
    	$arrOrders = OrderBasic::orderBy('id', 'desc')->get();
    	return view('Billing/index', ['arrOrders' => $arrOrders, 'Controller' => $this]);
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


    public function getTotOrdrCharge($id)
    {
    	$int = OrderCharge::where('order_id', $id)->sum('amounts');
    	if (!empty($int)) {
    		return $int;
    	}
    }

    public function orderReady( Request  $request )
    {
        $request = $request->all();
        $request['user_id'] = \Auth::id();
        Billing::create( $request );
        return back()->with('success','Successfully has been saved');
    }

    public function billingStatus($id)
    {
        $arrBilling = Billing::where('order_id', $id)->get()->first();
        return ($arrBilling['user_id']) ?? '';
    }

    public function getUserName($id)
    {
        $userId = $this->billingStatus($id);
        $arrUser = User::where('id', $userId)->get()->first();
        return ($arrUser['name']) ?? '-';
    }

    public function download($id)
    {

        $arrOrderDtl = OrderBasic::where('id', $id)->get()->first()->toArray();
        $arrCustomerDelt = Customer::with('contactAddress')->where('id', $id)->get()->first()->toArray();
        $arrOrderCharge = OrderCharge::where('order_id', $id)->get()->toArray();
        $arrBilling = Billing::where('order_id', $id)->get()->first()->toArray();

        $pdf = PDF::loadView('billing/bill', compact('arrCustomerDelt', 'arrOrderCharge', 'arrBilling'));
        return $pdf->stream('invoice.pdf');
    }


    public function getOneCustomer($id)
    {
        $arrCustomer = Customer::where('id', $id)->get()->first()->toArray();
        if(!empty($arrCustomer)) {
            return $arrCustomer;
        }
    }
}