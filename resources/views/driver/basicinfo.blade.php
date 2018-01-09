@extends('layouts.backend')
	@section('content')
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
								Driver Basic Info
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
			{{ Form::open(['route' => 'driver.basicinfo', 'class' => 'm-form m-form--fit m-form--label-align-right -group-seperator-dashed','files'=>true]) }}
				@include('driver.basicinfo_form')
			{{ Form::close() }}
			<!--end::Form-->
		</div>
{{-- Copy End Here --}}
</div>
@endsection	