@extends('layouts.backend')
	@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />

		<!--begin::Portlet-->
	<div class="m-content"> 	
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Order Details of #Order: {{request()->id}}
						</h3>
					</div>
				</div>
				<span class="dispatch_message"> </span>
			</div>


				<!--begin: Datatable -->
		<div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded">
			<table class="m-datatable__table" id="m-datatable--1299588710662" width="100%" style="display: block; height: auto; overflow-x: auto;">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row" style="height: 53px;">
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 50px;">Trip Id</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">What to do</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 150px;">Location</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Driver</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Truck</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Start Date</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Completed Date</span>
								
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Dispatch Date</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Completed Date</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Completed By </span>
							</th>

							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 130px;"> Action </span>
			
							</th>
						
							
						</tr>
					</thead>
					<tbody class="m-datatable__body" style="">
						@forelse($arrTripDetails as $arrTripDetail) 

						<?php
						
						 $tripWorkLocationsDetails = $Controller->tripWorkLocations($arrTripDetail->trip_no);

						 $workOnLocations =  $Controller->workOnLocations($tripWorkLocationsDetails['trip_work_id']);
						 $arrTripAddress = $Controller->getRowTripLocation($tripWorkLocationsDetails['trip_location_id']);


			            if(isset($arrTripAddress)) {
			              $strTripAddress = $arrTripAddress->address . ', '. $arrTripAddress->city . ', '. $arrTripAddress->state . ', '. $arrTripAddress->zip;
			            } else {
			              $strTripAddress = '';
			            }
			            $driver_name = $Controller->getDriverNameByTruckId($arrTripDetail->driver_id);
			            $driver_name =  $driver_name['dfname']. ' ' . $driver_name['dlname'];
			          
			            ?>
						

							<tr data-row="0" class="m-datatable__row m-datatable__row--even trip_completed_row"  style="height: 43px;">
								<td data-field="truck" class="m-datatable__cell">
									<span style="width: 50px;">  {{ ++$loop->index  }} </span>
								</td>
								<td data-field="workOnLocations" class="m-datatable__cell">
									<span style="width: 100px;"> {{$workOnLocations}}  </span>
								</td>
								<td data-field="trip_address" class="m-datatable__cell">
									<span style="width: 150px;">  {{ $strTripAddress }} </span>
								</td>
								<td data-field="driver_name" class="m-datatable__cell">
									<span style="width: 100px;">{{ $driver_name }}</span>
								</td>
								<td data-field="Terminated On" class="m-datatable__cell">
									<span style="width: 100px;">{{ $arrTripDetail->truck_id }}
										
									</span>
								</td>
								
								<td data-field="start_trip_date On" class="m-datatable__cell">
									<span style="width: 100px;">{{ $arrTripDetail->start_trip_date }}
										
									</span>
								</td>

								<td data-field="completed_trip_date" class="m-datatable__cell">
									<span style="width: 100px;">{{ $arrTripDetail->completed_trip_date }}
										
									</span>
								</td>
								<td data-field="dispatch_date" class="m-datatable__cell">
									<span style="width: 100px;">{{ $arrTripDetail->dispatch_date }}
										
									</span>
								</td>
								<td data-field="" class="m-datatable__cell">
									
                					@if( !empty($arrTripDetail->completed_date) )
                						<span style="width: 100px;">{{ $arrTripDetail->completed_date }}</span>
                					@else
									<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" > 
					                {!! Form::text('completed_date', null, ['id'=>'completed_date', 'placeholder'=>'Completed Date']) !!}
					                    <span class="input-group-addon">
					                        <i class="la la-calendar"></i>
					                    </span>
					                </div>

					                @endif
                						<span id="show_completed_date" style="width: 100px;"></span>
								</td>

								<td data-field="completed_by" class="m-datatable__cell">
									<span style="width: 100px;"> ABC </span>
								</td>

								<td data-field="complete_button On" class="m-datatable__cell">
									@if( !empty($arrTripDetail->completed_date) )
										<a class="btn btn-warning btn-xs btn-detail completed_disabled" data-tripid="{{$arrTripDetail->id}}">Complete</a>
									@else
										<a class="btn btn-warning btn-xs btn-detail completed_submit" data-tripid="{{$arrTripDetail->id}}">Complete</a>
									@endif

								</td>
								
								
							</tr>
						
						@empty
						<tr>No Trip Assign </tr>
						@endforelse
									
					</tbody>
				</table>
			</div>
				<!--end: Datatable -->
			</div>
		</div>
</div>




			
		</div>
		<!--end::Portlet-->
	</div>

@endsection