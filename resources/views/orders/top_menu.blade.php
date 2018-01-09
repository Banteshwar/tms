@php
	$orderEditId = (session()->get('order_edit_id')) ?? '';
	$customerEdit = !empty($orderEditId) ? 'edit_' : '';
	$disable = empty($orderEditId) ? 'not-active' : '';
@endphp


<div class="m-subheader ">
	<div class="align-items-right" style="margin-bottom: 30px;">
		<div class="mr-auto">			
			<div class="btn-group menu_tabs">
				<label class="btn btn-warning active">
					{{-- <input type="radio" name="options" id="option1" autocomplete="off" checked=""> --}}
					<a  href="{{ url('/order/'.$customerEdit.'basicinfo/'.$orderEditId) }}" class="m-menu__link ">
					
						<span class="d-none d-sm-inline">
							Basic Info
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{url('/order/location') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Location
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/order/charge') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Charge
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/order/trip') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Trip
						</span>
					</a>
				</label>
				{{-- <label class="btn btn-warning">
					<a  href="{{ url('/order/trips') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Trips
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/order/imaging') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Imaging
						</span>
					</a>
				</label> --}}
			</div>

		</div>
	</div>
</div>
