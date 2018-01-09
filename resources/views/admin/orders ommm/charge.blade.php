@extends('layouts.backend')
	@section('content')
	@include('admin.orders.top_menu')
	<div class="m-content">
		<div class="row">
			
			<div class="col-md-8">
				<!--begin::Portlet-->
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
											Charge Type
								</h3>
							</div>
						</div>
					</div>
					@include('admin.orders.charge_details')
					<hr />

					<!--begin::Form-->
					{{ Form::open(['route' => 'order.charge', 'class' => 'm-form m-form--fit m-form--label-align-right -group-seperator-dashed','files'=>true]) }}
						@include('admin.orders.charge_form')
					{{ Form::close() }}	
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
			<div class="col-md-4">				
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Enter Charge
								</h3>
							</div>
						</div>
					</div>
					
					<div class="m-portlet__body">

						@include('admin.orders.charge_total')


					</div>
				</div>
			</div>

		</div>
	</div>
@endsection