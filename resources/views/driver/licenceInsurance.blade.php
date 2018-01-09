@extends('layouts.backend')
	@section('content')
      	@php				      		
			$driver_id = \Session::get('driver_id') ?? '';
      	@endphp
      	@include('driver.top_menu')
		<div class="m-content">
			<div class="row">
				<div class="col-lg-12">					
					<!--begin::Portlet-->
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Licence Insurance
									</h3>
								</div>
							</div>
						</div>
				    		{{ Form::open( ['route'=>'driver.createlicence','class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
							@php
							    if($driver_id):
							    	echo '<input name="driver_id" type="hidden" value="'. $driver_id .'"/>';
							    endif;
							@endphp

								@include('driver.licenceInsurance_form')
								
							{{ Form::close() }}
						<!--end::Form-->
					   </div>
					<!--end::Portlet-->
				</div>
			</div>
		</div>
@endsection