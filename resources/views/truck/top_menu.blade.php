@php
	$truckEditId = (session()->get('truck_edit_id')) ?? '';
	$edit = !empty($truckEditId) ? 'edit_' : '';
	$disable = empty($truckEditId) ? 'not-active' : '';
@endphp

<div class="m-subheader ">
	<div class="align-items-right" style="margin-bottom: 30px;">
		<div class="mr-auto">
			
			<div class="btn-group menu_tabs">
				<label class="btn btn-warning active">
					{{-- <input type="radio" name="options" id="option1" autocomplete="off" checked=""> --}}
					<a  href="{{ url('/trucks/'.$edit.'basic_info/' . $truckEditId) }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Basic Info
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					
					<a  href="{{ url('/trucks/'.$edit.'other_detail/'. $truckEditId) }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Other Detail
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/trucks/'.$edit.'ap_deduction/'. $truckEditId) }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Ap Deduction
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/trucks/upload_documents') }}" class="m-menu__link {{ $disable }}">
						<span class="d-none d-sm-inline">
							Imaging
						</span>
					</a>
				</label>
			</div>

		</div>
	</div>
</div>
