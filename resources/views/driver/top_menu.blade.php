@php
	$driverEditId = (session()->get('driver_edit_id')) ?? '';
	$driverEdit = !empty($driverEditId) ? 'edit_' : '';
	$disable = empty($driverEditId) ? 'not-active' : '';
@endphp
<div class="m-subheader ">
	<div class="align-items-right" style="margin-bottom: 30px;">
		<div class="mr-auto">			
			<div class="btn-group menu_tabs">
				<label class="btn btn-warning active">
					<a  href="{{ url('driver/'.$driverEdit.'basicinfo/'.$driverEditId) }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Basic Info
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{url('driver/'.$driverEdit.'licenceinfo/'.$driverEditId) }}" class="m-menu__link {{ $disable }} ">
						<span class="d-none d-sm-inline">
							Licence info
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('driver/'.$driverEdit.'formw9/'.$driverEditId) }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Formw9
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('driver/'.$driverEdit.'checklist/'.$driverEditId) }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Check list
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('driver/uploaddocuments') }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Imaging
						</span>
					</a>
				</label>
			</div>
		</div>
	</div>
</div>
