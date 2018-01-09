@extends('layouts.backend')
	@section('content')

@php
	$address = [1=>'BNSF-BNSF- Oakland International Gateway,Oakland, CA' , 2=>'OICT-Oakland International Container Terminal , Oakland, CA' , 3 => 'PAO-Ports America Oakland, Oakland,CA' ,4 =>  'TRAPAC-TraPac, Oakland, CA' , 4 => 'UPFS-UP- Ferro Street, Oakland, CA' , 5 => 'UPMH-UP - Middle Harbor, Oakland, CA'];
@endphp
<div class="m-content">						
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Billing List
				</h3>
			</div>
		</div>
	</div>

	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->
<!--begin: Datatable -->
		<table class="m-datatable" id="html_table" width="100%">
			<thead>
				<tr>
					<th title="Field #1">
						Order Id
					</th>
					<th title="Field #1">
						Terminal
					</th>
					<th title="Field #3">
						Customer
					</th>
					<th title="Field #11">
						From
					</th>
					<th title="Field #11">
						To
					</th>
					<th title="Field #11">
						Total chrg
					</th>
					<th title="Field #11">
						Status
					</th>
					<th title="Field #11">
						Ready
					</th>
					<th title="Field #11">
						Billing By
					</th>
					<th title="Field #11">
						Print
					</th>
				</tr>
			</thead>
			<tbody>		
				@forelse ($arrOrders as $order)
				<tr>
					<td>
						{{ $order->id }}
					</td>
					<td>
						{{ $Controller->getTerminalName($order->terminal) }}
					</td>
					<td>
						{{ $Controller->getOneCustomer($order->customer_billee_name)['full_name'] }}
					</td>

					<td>
						{{ ($address[$order->sch_at]) ?? '-' }}
					</td>

					<td>
						{{ ($address[$order->terminated_at]) ?? '-' }}
					</td>

					<td>
						{{ ($Controller->getTotOrdrCharge($order->id)) ?? '-' }}
					</td>

					<td>
						@if ($Controller->billingStatus($order->id))
							Billing Ready
						@else		
							Deliverd
						@endif
					</td>

					<td>
						@if ($Controller->billingStatus($order->id))
							<i class="fa fa-check"></i>
						@else		
							{{ Form::checkbox('ready', $order->id, null, ['class' => 'ready']) }}
						@endif
					</td>

					<td>
						{{ $Controller->getUserName($order->id) }}
					</td>
					<td>
						@if ($Controller->billingStatus($order->id))
							<a href="{{ url('/billing/download/'.$order->id) }}"><i class="fa fa-download"></i></a>
						@else 
						 	-
						@endif
					</td>
				</tr>
				@empty
					<tr>
						<td>
					   	 <p>No Driver Found</p>
					    </td>
					</tr>
				@endforelse
				
			</tbody>
		</table>
		<!--end: Datatable -->
	</div>
</div>
</div>

<!--begin::Modal-->
	<div class="modal fade" id="ready_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document" style="width: 400px">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Message
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				{{ Form::open(['route' => 'billing.orderReady', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
					{{ Form::hidden('order_id', null, ['id'=>'order_id']) }}
					<div class="modal-body">
						<div class="form-group" style="text-align: center;">
							Are You Sure Want to Create Billing for this Order?
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary cls_ready" data-dismiss="modal">
							No
						</button>
						
						<button type="submit" class="btn btn-primary">
							Yes
						</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
<!--end::Modal-->

@endsection