@extends('layouts.backend')
@section('content')
	@php                            
        $customerId = \Session::get('customer_edit_id') ?? '';
    @endphp
    @include('customer.top_menu')

	<div class="m-content">
		<div class="row">
			<div class="col-md-6">
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Billing Details
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					{{ Form::open(['route'=>'customer.saveBillingDetail', 'class' => 'm-form m-form--fit m-form--label-align-right -group-seperator-dashed','files'=>true]) }}
						 @php
				            if($customerId):
				                echo '<input name="customer_id" type="hidden" value="'. $customerId .'"/>';
				            endif;                        
				        @endphp

						@include('customer.billing_details_form')
					{{ Form::close() }}
					
					
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
			<div class="col-md-6">				
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Others Details
								</h3>
							</div>
						</div>
					</div>
					{{ Form::open(['route'=>'customer.billingOtherDetail','class' => 'm-form m-form--fit m-form--label-align-right -group-seperator-dashed','files'=>true]) }}

						@php
				            if($customerId):
				                echo '<input name="customer_id" type="hidden" value="'. $customerId .'"/>';
				            endif;                        
				        @endphp

						@include('customer.other_details_form')
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection	