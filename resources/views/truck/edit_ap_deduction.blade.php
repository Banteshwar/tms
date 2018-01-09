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

				{{ Form::model($apDeduction, ['route' => ['truck.updateApDeduction', request()->id], 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
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

				{{ Form::open(['route' => 'truck.updateOnetimedeductions', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
					{{ Form::hidden('truck_id', request()->id ) }}
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

							@forelse($truckTimeDeductions as $truckTimeDeduction)
								<div class="row">
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{  Form::select('deduction_type[]', ['Additional Escrow' => 'Additional Escrow', 'Balance Owned' => 'Balance Owned', 'Cash Advance' => 'Cash Advance', 'Credit Card Charges' => 'Credit Card Charges', 'Escrow account' => 'Escrow account', 'Fuel Charges' => 'Fuel Charges'], $truckTimeDeduction->deduction_type, ['class'=>'form-control m-input m-input--square', 'id' => 'terminal']) }}
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ Form::text('deduction_amount[]', $truckTimeDeduction->deduction_amount, ['class'=>'form-control', 'id'=> 'deduction_amount', 'placeholder'=>'Amount']) }}
									</div>
									<div class="col-lg-3 col-md-12 col-sm-12">
										{{ Form::text('deduction_comment[]', $truckTimeDeduction->deduction_comment, ['class'=>'form-control', 'id'=> 'comment', 'placeholder'=>'Comment']) }}
									</div>	
									<div class="col-lg-3 col-md-12 col-sm-12">														
										@if ( $loop->index == '0' )
											<a href="" class="add"><i class="m-nav__link-icon fa fa-plus"></i></a>
										@else
											<a href="" class="remove"><i class="m-nav__link-icon fa fa-minus"></i></a>
										@endif
									</div>													
								</div>
								@empty

							@endforelse
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