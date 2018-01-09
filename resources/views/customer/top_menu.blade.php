@php
	$customerEditId = (session()->get('customer_edit_id')) ?? '';
	$customerEdit = !empty($customerEditId) ? 'edit_' : '';
	$disable = empty($customerEditId) ? 'not-active' : '';
@endphp

<div class="m-subheader ">
	<div class="align-items-right" style="margin-bottom: 30px;">
		<div class="mr-auto">
			
			<div class="btn-group menu_tabs">
				<label class="btn btn-warning active">
					{{-- <input type="radio" name="options" id="option1" autocomplete="off" checked=""> --}}
					<a  href="{{ url('/customer/'.$customerEdit.'basicinfo/'.$customerEditId) }}" class="m-menu__link">
						<span class="d-none d-sm-inline">
							Basic Info
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{url('/customer/'.$customerEdit.'address_contact/'.$customerEditId) }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Address Contact
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/customer/'.$customerEdit.'billing_details/'.$customerEditId) }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Billing Details
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/customer/'. $customerEdit .'set_customer_email/'.$customerEditId) }}" class="m-menu__link  {{ $disable }}">
						<span class="d-none d-sm-inline">
							Email Notification
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/customer/customer_imaging') }}" class="m-menu__link  {{ $disable }}">
						<span class="d-none d-sm-inline">
							Imaging
						</span>
					</a>
				</label>
			</div>

		</div>
	</div>
</div>
