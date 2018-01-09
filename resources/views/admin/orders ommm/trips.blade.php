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
									Trip Details
								</h3>
							</div>
						</div>
					</div>
						<div class="m-portlet__body">
							<div class="form-group m-form__group row">
							<table class="table" id="trip_detail">
							    <tbody>
								@php
									$i = 0 ;
								@endphp

								@foreach ($addedLocation as $key => $value) 
									@php
										$arrTripLocation =  $Controller->getTripLocation($addedLocation[$i]);

										
									@endphp

									@php


										$getTripWorkbyOrder =  $Controller->getTripWorkbyOrder(session()->get("order_edit_id"),$selectedOrderLocation[$i]);
										
									@endphp

									

									    <tr class="trip_location">
									        <td width="150px"> 
                                            

									        	{{ Form::select('trip_work', $work_on_locations ,$selectedOrderLocation[$i], ['class' => 'deliver_point']) }}
									       
											</td> <td width="50px">at </td>
											<td width="200px">
										        {{ Form::select('trip_location',  $getTripWorkbyOrder, $selectedTripLocationId[$i] , ['class'=>'trip_loct'] ) }}
											</td>											
											{{-- <td><a href="" class="add_trip_location"><i class="m-nav__link-icon fa fa-plus"></i></a></td>
											<td><a href="" class="remove_trip_location"><i class="m-nav__link-icon fa fa-minus"></i></a></td> --}}
											<td><a class="add_details" data-id={{ $i+1 }} href="#">Add Details</a></td>
										</tr>
									@php $i++; @endphp
								@endforeach
							      
							    </tbody>
							  </table>
							</div>
						</div>

					</div>

					<div class="m-portlet m-portlet--tab" id="add_trip_detail">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Add Trip Details
									</h3>
								</div>
							</div>
						</div>
						<div class="m-portlet__body">

							{{ Form::open([ 'route' => 'orders.trips', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed' ]) }}

							{{ Form::hidden('order_id', session()->get("order_edit_id")) }}
							{{ Form::hidden('trip_no', 4) }}

							<div class="form-group m-form__group row">
								<div class="col-4">
									<label class="col-form-label"> Driver </label>
								</div>
								<div class="col-lg-6 ">
									<div class="input-group " id="driver" >
										{{ Form::select('driver_id', $drivers ,null , ['class' => 'form-control m-input m-input--square', 'id' => 'trip_driver']) }}

									</div>
                                </div>
							</div>

							<div class="form-group m-form__group row">
								<div class="col-4">
									<label class="col-form-label"> Truck </label>
								</div>
								<div class="col-lg-6 ">
									<div class="input-group " id="truck" >
										{{ Form::select('truck_id', [] ,null , ['class' => 'form-control m-input m-input--square', 'id' => 'trip_truck']) }}
									</div>
                                </div>
							</div>


							<div class="form-group m-form__group row">
								<div class="col-4">
									<label class="col-form-label"> Start Date & Time </label>
								</div>
								<div class="col-lg-6 ">
									<div class="input-group date" id="m_datetimepicker_5" >
										{!! Form::text('start_trip_date', null, ['class' => 'form-control m-input','id'=>'start_trip_date', 'placeholder'=>'Start Date & Time']) !!}
										<span class="input-group-addon">
											<i class="la la-calendar glyphicon-th"></i>
										</span>

									</div>
                                </div>
							</div>

							<div class="form-group m-form__group row">
								
								<div class="col-4">
									<label class="col-form-label"> Completed Date & Time </label>
								</div>
								<div class="col-lg-6 ">
									<div class="input-group date" id="m_datetimepicker_5_2" >
					
										{!! Form::text('completed_trip_date', null, ['class' => 'form-control m-input','id'=>'completed_trip_date', 'placeholder'=>'Completed Date & Time']) !!}
										<span class="input-group-addon">
											<i class="la la-calendar glyphicon-th"></i>
										</span>

									</div>
                                </div>

								
							</div>


							<div class="form-group m-form__group row">
								<div class="col-lg-3">
								
									<label class="col-form-label">
										Comments:
									</label>
								</div>

								<div class="col-lg-7" >
								{!! Form::textarea('comments', null, ['class' => 'form-control m-input m-input','id'=>'comments', 'size' => '50x3','placeholder'=>'Comments']) !!}
								</div>
							</div>


						
							<div class="form-group m-form__group  trip_pay">
								<div class="row ">
									<div class="col-4">	Pay Type </div>
									<div class="col-2">Units</div>
							        <div class="col-2">Rates</div>
							        <div class="col-3">Amounts</div>
							        <div class="col-1"></div>
							    </div>
							    <div class="row trip_pay_count" >
							    	<div class="col-4">
									{{ Form::select('payment_details[pay_type][]', 
												[
												   'Additional Dray'  =>  'Additional Dray' ,
													'Attempted Pickup'  =>  'Attempted Pickup' ,
													'Bobtail'  =>  'Bobtail' ,
													'Chassis Reposition'  =>  'Chassis Reposition' ,
													'Chassis Split'  =>  'Chassis Split' ,
													'Detention'  => 'Detention' ,
													'Dry Run'  =>  'Dry Run' ,
													'Fuel Surcharge'  =>  'Fuel Surcharge' ,
													'Hauling Refrigerated Cargo'  =>  'Hauling Refrigerated Cargo' ,
													'Hazardous Materials'  =>  'Hazardous Materials' ,
													'Hazardous Materials'  =>  'Hazardous Materials' ,
													'Heavy'  =>  'Heavy' ,
													'Local Move'  =>  'Local Move' ,
													'Miscellaneous'  =>  'Miscellaneous' ,
													'Other'  => 'Other' ,
													'Scale'  =>  'Scale' ,
													'Stop Off'  => 'Stop Off' ,
													'Toll'  => 'Toll' ,
													'Triaxle'  =>  'Triaxle' ,
													'Trip Pay'  =>  'Trip Pay' ,
												],
											    null, 
												['class' => 'trip_pay_type','id' => 'trip_pay_type', 'style' => 'width: 100%'])   
									}}		
									</div>
								

								<div class="col-2">									
									{!! Form::text('payment_details[units][]', null, ['class' => 'form-control','id'=>'trip_units', 'placeholder'=>'Units']) !!}
								</div>
								<div class="col-2">								
									{!! Form::text('payment_details[rates][]', null, ['class' => 'form-control','id'=>'trip_rates', 'placeholder'=>'Rates']) !!}
						        </div>

								<div class="col-3">	
									{!! Form::text('payment_details[amount][]', null, ['class' => 'form-control','id'=>'trip_amount', 'placeholder'=>'Amounts']) !!}
								</div>
								
								<div class="col-lg-1 col-md-12 col-sm-12">
									<a href="" class="trip_pay_add"><i class="m-nav__link-icon fa fa-plus"></i></a> 
								</div>	
										
								</div>
							</div>

						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<div class="row">
									<div class="col-2"></div>
									<div class="col-10">
										<button type="submit" class="btn btn-success">
											Submit
										</button>
										<button type="reset" class="btn btn-secondary">
											Cancel
										</button>
									</div>
								</div>
							</div>
						</div>

						{{ Form::close() }}

									
					</div>
	
				</div>

					

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
									Trips - Click on the truck to Select
								</h3>
							</div>
						</div>
					</div>

					
					<div class="m-portlet__body">

						<div class="form-group m-form__group row">
								
								<div class="col-12">
									
									<table class="table">
									    <thead>
									      <tr>
									        
									        <th>No</th>
									        <th>Truck</th>
									        <th>Start</th>
									        <th>Trip Pay</th>
									      </tr>
									    </thead>
									    <tbody>
											@forelse ($arrTripDetails as $tripDetail)
												<tr>
										        	<td> {{ ++$loop->index }} </td>
										        	<td> {{ $tripDetail->truck_id  }} </td>
										        	<td> {{ $tripDetail->start_trip_date  }} </td>
										        	<td>  
														@php
														if(!empty($tripDetail->payment_details)) {
															$arrPayMentsDtl = unserialize($tripDetail->payment_details);
															$intTotl = array_sum($arrPayMentsDtl['amount']);
															for ($i=0; $i < count($arrPayMentsDtl['pay_type']) ; $i++) { 
																
														@endphp
																{{ $arrPayMentsDtl['pay_type'][$i] }} --  
																{{ ($arrPayMentsDtl['amount'][$i]) ?? '0' }}
																<br/>
														@php
															}
														}
														
														@endphp

										        	</td>
										      	</tr>
											@empty
												<td>No Record Found</td>
											@endforelse

									      



									     
									      <tr>
									      	<td></td>
									      	<td></td>
									      	<td></td>
									        <td>
									        	@if(!empty($intTotl))
									        	Total :  {{ $intTotl }}
									        	@endif
 											</td>
									        
									      </tr>
									    </tbody>
									  </table>
								</div>
							</div>
							<hr/>
					</div>

				</div>


			</div>						
		</div>
	</div>

@endsection	