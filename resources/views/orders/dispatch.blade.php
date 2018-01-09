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
								<span style="width: 120px;">What to do</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 200px;">Location</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 120px;">Driver</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Truck</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 250px;">Excepted Date</span>
							</th>
							
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 130px;">Dispatch Date</span>
							</th>
							<th class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 130px;">Dispatched By</span>
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
			            // echo $arrTripDetail->driver_id;
			            $driver_name = $Controller->getDriverNameByTruckId($arrTripDetail->driver_id);
			            $driver_name =  $driver_name['dfname']. ' ' . $driver_name['dlname'];
			            $truck_name  = $Controller->getTruckLicencePlate($arrTripDetail->truck_id);
			          
			            ?>
						

							<tr data-row="0" class="m-datatable__row m-datatable__row--even trip_disptch_row"  style="height: 43px;">
								<td data-field="truck" class="m-datatable__cell">
									<span style="width: 50px;">  {{ ++$loop->index  }} </span>
								</td>
								<td data-field="trml" class="m-datatable__cell">
									<span style="width: 120px;"> {{$workOnLocations}}  </span>
								</td>
								<td data-field="Owner" class="m-datatable__cell">
									<span style="width: 200px;">  {{ $strTripAddress }} </span>
								</td>
								<td data-field="Owner" class="m-datatable__cell">
									<span style="width: 120px;">{{ $driver_name }}</span>
								</td>
								<td data-field="truck_id" class="m-datatable__cell">
									<span style="width: 100px;">{{ $truck_name }}
										
									</span>
								</td>
								
								<td data-field="Terminated On" class="m-datatable__cell">
									<span style="width: 250px;">Start Date: {{ $arrTripDetail->start_trip_date }}</span>
									<span style="width: 250px;">Completed Date : {{ $arrTripDetail->completed_trip_date }}</span>
								</td>

								
								<td data-field="Terminated On" class="m-datatable__cell">
									
                					@if( !empty($arrTripDetail->dispatch_date ))
                						<span style="width: 130px;">{{ $arrTripDetail->dispatch_date }}</span>
                					@else
									<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" > 
					                {!! Form::text('dispatch_date', null, ['id'=>'dispatch_date', 'placeholder'=>'Release Date']) !!}
					                    <span class="input-group-addon">
					                        <i class="la la-calendar"></i>
					                    </span>
					                </div>

					                @endif
                						<span id="show_dispatch_date" style="width: 130px;"></span>
								</td>
								<td data-field="Terminated On" class="m-datatable__cell">
									{{-- <input type="hidden"  id="dispatch_by" name="dispatch_by" value="{{ }}"> --}}
                					@if( !empty($arrTripDetail->dispatch_by ))
                						<span style="width: 130px;">{{ $Controller->getUserName($arrTripDetail->dispatch_by) }}</span>
                					@else
									   ---
					                @endif
                						<span id="show_dispatch_by" style="width: 130px;"></span>
								</td>




								<td data-field="Terminated On" class="m-datatable__cell">
									@if( !empty($arrTripDetail->dispatch_date ))
										<a class="btn btn-warning btn-xs btn-detail dispatch_diabled" data-tripid="{{$arrTripDetail->id}}">Dispatch</a>
									@else
										<a class="btn btn-warning btn-xs btn-detail dispatch_submit" data-tripid="{{$arrTripDetail->id}}">Dispatch</a>
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