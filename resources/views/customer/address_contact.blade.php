@extends('layouts.backend')
@section('content')
	@php                            
        $customerId = \Session::get('customer_edit_id') ?? '';
    @endphp
    @include('customer.top_menu')
	<div class="m-content">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Address/Contact	
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
	        {{ Form::open(['route'=>'customer.saveAddressContact', 'class'=> 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}

		        @php
		            if($customerId):
		                echo '<input name="customer_id" type="hidden" value="'. $customerId .'"/>';
		            endif;                        
		        @endphp

				@include('customer.address_contact_form')
			{{ Form::close() }}
			<!--end::Form-->
	    </div>
	</div>
@endsection 