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
									Ap Deductions
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->									

					{{ Form::open(['route' => 'truck.apDeduction', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
						@include('truck.ap_deduction_form')
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
									Ap Accounts
								</h3>
							</div>
						</div>
					</div>	

					<div class="m-portlet__body">                                        
						<div class="m-form__group form-group ap_accounts">										
							@forelse ($truckTimeDeductions as $truckTimeDeduction)											
								<div class="row">
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ $truckTimeDeduction->deduction_type }}
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ $truckTimeDeduction->deduction_amount  }}
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ $truckTimeDeduction->deduction_comment }}
									</div>
								</div>
							@empty
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										No Records Available!
									</div>
								</div>
							@endforelse
						</div>
					</div>
				</div>	

				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									One Time Deductions (next stlmnt. will pick these up)
								</h3>
							</div>
						</div>
					</div>

					{{ Form::open(['route' => 'truck.onetimedeductions', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
						<input type="hidden" name="truck_id" value="{{ session()->get('truck_insert_id') }}">
						<div class="m-portlet__body">                                        
							<div class="m-form__group form-group deduction_type">
								<div class="row">
									<div class="col-lg-3 col-md-12 col-sm-12">
										Deduction Type	
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										Amount
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										Comment
									</div>	
									<div class="col-lg-3 col-md-12 col-sm-12">
										&nbsp;
									</div>													
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{  Form::select('deduction_type[]', ['Additional Escrow' => 'Additional Escrow', 'Balance Owned' => 'Balance Owned', 'Cash Advance' => 'Cash Advance', 'Credit Card Charges' => 'Credit Card Charges', 'Escrow account' => 'Escrow account', 'Fuel Charges' => 'Fuel Charges'], null, ['class'=>'form-control m-input m-input--square', 'id' => 'terminal']) }}
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ Form::text('deduction_amount[]', null, ['class'=>'form-control', 'id'=> 'deduction_amount', 'placeholder'=>'Amount']) }}
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ Form::text('deduction_comment[]', null, ['class'=>'form-control', 'id'=> 'comment', 'placeholder'=>'Comment']) }}
									</div>	
									<div class="col-lg-3 col-md-12 col-sm-12">
										<a href="" class="add"><i class="m-nav__link-icon fa fa-plus"></i></a> 
									</div>													
								</div>
							</div>

						</div>

						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<button type="submit" class="btn btn-primary">
									Save One Time Deductions
								</button>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>		
		</div>
	</div>
@endsection	