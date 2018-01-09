@extends('layouts.backend')

@section('content')
	<div class="m-portlet m-portlet--mobile">
    	<!-- BEGIN: Subheader -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">
						Dashboard
					</h3>
				</div>
				<div>
					<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
						<span class="m-subheader__daterange-label">
							<span class="m-subheader__daterange-title">Today:</span>
							<span class="m-subheader__daterange-date m--font-brand">Dec 13</span>
						</span>
						<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
							<i class="la la-angle-down"></i>
						</a>
					</span>
				</div>
			</div>
		</div>
		<!--End::Main Portlet-->
	</div>
@endsection