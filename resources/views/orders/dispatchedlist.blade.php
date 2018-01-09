@extends('layouts.backend')
	@section('content')
<div class="m-content">						
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text" id="test">
						Orders Dispatched
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
							<div class="m-dropdown__wrapper">
								<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
								<div class="m-dropdown__inner">
									<div class="m-dropdown__body">
										<div class="m-dropdown__content">
											<ul class="m-nav">
												<li class="m-nav__section m-nav__section--first">
													<span class="m-nav__section-text">
														Quick Actions
													</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-share"></i>
														<span class="m-nav__link-text">
															Create Post
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-chat-1"></i>
														<span class="m-nav__link-text">
															Send Messages
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-multimedia-2"></i>
														<span class="m-nav__link-text">
															Upload File
														</span>
													</a>
												</li>
												<li class="m-nav__section">
													<span class="m-nav__section-text">
														Useful Links
													</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-info"></i>
														<span class="m-nav__link-text">
															FAQ
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-lifebuoy"></i>
														<span class="m-nav__link-text">
															Support
														</span>
													</a>
												</li>
												<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
												<li class="m-nav__item m--hide">
													<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
														Submit
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
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
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="{{url('/order/basicinfo')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
							<span>
								{{-- <i class="la la-cart-plus"></i> --}}
								<span>
									Add New Order
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
		<!--begin: Datatable -->

			<table class="m-datatable" id="html_table" width="100%" style="overflow-x: hidden!important;">
		
					<thead class="m-datatable__head">
						<tr class="m-datatable__row" style="height: 53px;">
							<th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" >
								Id
							</th>
							<th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" >
								Terminal
							</th>
							<th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" >
								<span style="width: 220px;">Customer Name
							</th>
							<th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" >
								Appointment
							</th>
							<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" >
								Ship / Rail Line:
							</th>
							{{-- <th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" >
								Status
							</th> --}}
							
							<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" >
								Complete
							</th>
							<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" >
								Action
							</th>
						</tr>
					</thead>
					<tbody class="m-datatable__body" style="">

						@forelse ($arrOrders as $order)
							<tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 43px;">
								
								<td data-field="truck" class="m-datatable__cell">
									{{ $order->id }}
								</td>

								<td data-field="trml" class="m-datatable__cell">
									{{ $Controller->getTerminalName($order->terminal) }}
								</td>

								<td data-field="Owner" class="m-datatable__cell">
									<span style="width: 220px;">
										{{ ($Controller->getOneCustomer($order->customer_billee_name)['full_name']) ?? '' }} 
								</td>

								<td data-field="Owner" class="m-datatable__cell">
									{{ $order->appointment_date  }}
								</td>

								<td data-field="Terminated On" class="m-datatable__cell">
									{{ $order->ship_rail_line }} 
								</td>

								{{-- <td data-field="Status" class="m-datatable__cell">
									{{ '$status' }}
								</td> --}}

								

								<td data-field="Status" class="m-datatable__cell">
									<a href="{{url("/order/complete/{$order->id}")}}">Check</a>

								</td>

								<td data-field="Edit" class="m-datatable__cell">
									
										<a href="{{url("/order/edit_basicinfo/{$order->id}")}}"><i class="la la-edit"></i></a>
									
								</td>

							</tr>
							@empty
							<tr>
								<td colspan="11" align= "center"> <strong> No Records Found! </strong> </td>
							</tr>
						@endforelse			
					</tbody>
				</table>
			
			</div>
		</div>
</div>

<!--begin::Modal-->
	<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						You are going to <span class="status_truck">  </span> this truck.
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				{{ Form::open(['route' => 'truck.statusTruck', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
					{{ Form::hidden('truck_id', null, ['id'=>'truck_id']) }}
					{{ Form::hidden('status', null, ['id'=>'truck_status']) }}
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">
								Message:
							</label>
							{{ Form::textarea('message', null, ['size' => '30x5', 'class' => 'form-control']) }}
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">
							Cancel
						</button>
						
						<button type="submit" class="btn btn-primary">
							Save
						</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
<!--end::Modal-->
@endsection					