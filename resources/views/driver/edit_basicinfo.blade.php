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
								Driver Basic Info <span style="float:right">
								
								@if ($user_id != '')
									<a href="{{url("/driver/edit_driverlogin/{$user_id}/{$driver_id}")}}" >Edit Driver Access</a>
							    @else
									<a href="{{url("/driver/add_driverlogin/{$driver_id}")}}" >Create Driver Access</a>
							    @endif
								</span>
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
			{{ Form::model($basicInfo ,['route' => ['driver.updateBasicInfo', request()->id], 'class' => 'm-form m-form--fit m-form--label-align-right -group-seperator-dashed','files'=>true]) }}
				@include('driver.basicinfo_form')
			{{ Form::close() }}
			<!--end::Form-->
		</div>
{{-- Copy End Here --}}
</div>
@endsection	