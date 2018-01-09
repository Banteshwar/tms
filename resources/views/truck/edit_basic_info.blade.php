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
									Basic info
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->

					{{ Form::model($basicInfo , ['route' => ['truck.updateBasicInfo', $basicInfo->id], 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
						@include('truck.basic_info_form')
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
									Add Owner
								</h3>
							</div>
						</div>
					</div>

					{{ Form::open(['route' => 'truck.addOwner', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}


							<div class="form-group m-form__group">
								<label for="vin_no">
									Name
								</label>
								{{ Form::text('name', null, ['class' => 'form-control m-input', 'id' => 'name', 'placeholder' => 'Name' ]) }}
							</div>

							<div class="form-group m-form__group">
								<label for="vin_no">
									Business name
								</label>
								{{ Form::text('business_name', null, ['class' => 'form-control m-input', 'id' => 'business_name', 'placeholder' => "Business name" ]) }}
							</div>


							<div class="m-portlet__body">
                                <div class="m-form__group form-group">
									<label for="">
										Type
									</label>
									<div class="m-radio-inline">
										<label class="m-radio">
											{{ Form::radio('type', '1', true) }}
											Sole proprietor
											<span></span>
										</label>
										<label class="m-radio">
											{{ Form::radio('type', '2') }}
											Partnership
											<span></span>
										</label>
										<label class="m-radio">
											{{ Form::radio('type', '3') }}
											Corporation
											<span></span>
										</label>
										<label class="m-radio">
											{{ Form::radio('type', '4') }}
											Other
											<span></span>
										</label>				
									</div>
								</div>
								<div class="form-group m-form__group">
									<label for="vin_no">
										Other
									</label>
									{{ Form::text('other_type', null, ['class' => 'form-control m-input', 'id' => 'other_type', 'placeholder' => "Other Type" ]) }}
								</div>

								<div class="form-group m-form__group">
									<label for="vin_no">
										Address
									</label>
									{{ Form::text('address', null, ['class' => 'form-control m-input', 'id' => 'address', 'placeholder' => "Address" ]) }}
								</div>
								
								<div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                            City / State / Zip
                                    </label>

                                    <div class="col-lg-9 col-md-12 col-sm-12">
                                        <div class="row align-items-center">
                                            <div class="col-4">
												{{ Form::text('city', null, ['class' => 'form-control m-input', 'id' => 'city', 'placeholder' => "City" ]) }}
                                            </div>

                                            <div class="col-4">
                                            	{{ Form::text('state', null, ['class' => 'form-control m-input', 'id' => 'state', 'placeholder' => "State" ]) }}
                                            </div>

                                            <div class="col-4">
                                            	{{ Form::text('zip', null, ['class' => 'form-control m-input', 'id' => 'zip', 'placeholder' => "Zip" ]) }}
                                            </div>
                                        
                                        </div>
                                            
                                    </div>
                                </div>

								<div class="form-group m-form__group">
									<label for="terminal">
										TIN
									</label>
									<div class="m-radio-inline">
										<label class="m-radio">
											{{ Form::radio('tin', '1', true) }}
											Social Sec #
											<span></span>
										</label>
										<label class="m-radio">
											{{ Form::radio('tin', '2', true) }}
											 Employer ID #
											<span></span>
										</label>
									</div>
								</div>


								<div class="form-group m-form__group">
									<label for="vin_no">
										SSN
									</label>
                                    {{ Form::text('ssn', null, ['class' => 'form-control m-input', 'id' => 'ssn', 'placeholder' => "SSN" ]) }}
								</div>

								<div class="form-group m-form__group">
									<label for="ein">
										EIN
									</label>
									{{ Form::text('ein', null, ['class' => 'form-control m-input', 'id' => 'ein', 'placeholder' => "EIN" ]) }}
								</div>


								<div class="form-group m-form__group">
									<label for="paid By">
										Paid By
									</label>
									<div class="m-radio-inline">
										<label class="m-radio">
											{{ Form::radio('paid_by', 'check', true) }}
											Check
											<span></span>
										</label>
										<label class="m-radio">
											{{ Form::radio('paid_by', 'direct_deposit') }}
											 Direct Deposit
											<span></span>
										</label>
									</div>
								</div>

								<div class="form-group m-form__group">
									<label for="comments">
										Comments
									</label>
									{{ Form::textarea('comments', null, ['size' => '30x3', 'id' => 'comments', 'class' => 'form-control m-input', 'placeholder' => 'Comment']) }}
								</div>

								<div class="form-group m-form__group">
									<label for="exampleSelect1">
										Terminal
									</label>
									{{  Form::select('terminal', $terminals, null, ['class'=>'form-control m-input m-input--square', 'id' => 'terminal']) }}
								</div>
							</div>
							
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<button type="submit" class="btn btn-primary">
										Add New Owner
									</button>
									<button type="reset" class="btn btn-secondary">
										Update
									</button>
								</div>
							</div>
						{{ Form::close() }}
						<!--end::Form-->	

				</div>	
			</div>
		</div>
	</div>
@endsection