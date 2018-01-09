@extends('layouts.backend')
	@section('content')
	@include('truck.top_menu')

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
									Other Detail
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					{{ Form::model($otherDetail, ['route' => ['truck.updateOtherDetail', request()->id], 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
						@include('truck.other_detail_form')
					{{ Form::close() }}
					<!--end::Form-->
				</div>
			<!--end::Portlet-->
			</div>
		</div>
	</div>

@endsection