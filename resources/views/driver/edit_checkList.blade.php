@extends('layouts.backend')
    @section('content')
    @php
	  $driver_id = \Session::get('driver_edit_id');
    @endphp
    @include('driver.top_menu')

    <div class="m-content">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="top-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
							Check List:  
                        </h3>
                    </div>
				</div>
			</div>
			@php
	    		$checklist = array( "DOT FILES", "DOT Application & (Pre-App)", "Copy of CDL",	"MVR", "Medical Card", "Long Form Physical", "Pre-Employment Urinalysis Form", "DOT Drug Test result & C.C", "Previous Employment Verification", "Certificate of Compliance with Driver’s License", "Hours of Service Record", "Drivers Road Test", "Certificate of Drivers Road Test", "Drivers Certification of Violations and Review", "DOT Required Spilt Sample/Receipt of Drug Handbook", "DOT Hand Book Receipt", "COMPANY POLICY FILES", "Independent Contractors Agreement (Driver must keep a copy)","Safety and Compliance Statement", "Vendor Information Record", "Direct Deposit Authorization (Voided Check)", "Unattended Cont./Unauthorized Pass", "W-9", "Copy of Social Security Card", "DOT TRUCK FILES", "Fuel Card / IFTA Sticker information", "Copy of IFTA Sticker", "Cab Card", "Annual Inspection", "Monthly Tractor Maintenance Report", "Copy of Insurance (Physical Damage)", "Has own Bobtail Insurance");
				
			@endphp

			<!--begin::Form-->
			{{ Form::open(['route' => ['driver.updateChecklist', request()->id], 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed','files'=>true]) }}
				
				@php
					if($driver_id) :
						echo '<input name="driver_id" type="hidden" value="'. $driver_id .'"/>';
		 			 endif;
				@endphp

				@include('driver.checklist_form')

			{{ Form::close() }}
			<!--end::Form-->
		</div>
	</div>	
@endsection