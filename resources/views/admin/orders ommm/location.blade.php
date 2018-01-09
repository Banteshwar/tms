@extends('layouts.backend')
	@section('content')	
	@include('admin.orders.top_menu')
	<div class="m-content">
		<div class="row">
			<div class="col-md-6">
				<!--begin::Portlet-->
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Add Locations
								</h3>
							</div>
						</div>
					</div>

					<!--begin::Form-->
					{{ Form::open(['route' => 'order.location', 'class' => 'm-form m-form--fit m-form--label-align-right -group-seperator-dashed','files'=>true]) }}
					
							@include('admin.orders.location_form')

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
									Location  Details
								</h3>
							</div>
						</div>
					</div>

					
					<div class="m-portlet__body">
						
						@include('admin.orders.location_details')
						
					</div>

					
						
					


				</div>
			</div>
						
		</div>
	</div>	
@endsection		