<div class="m-subheader ">
	<div class="align-items-right" style="margin-bottom: 30px;">
		<div class="mr-auto">			
			<div class="btn-group menu_tabs">
				<label class="btn btn-warning active">
					{{-- <input type="radio" name="options" id="option1" autocomplete="off" checked=""> --}}
					<a  href="{{ url('/admin/order/basicinfo') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Basic Info
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{url('/admin/order/location') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Location
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/admin/order/charge') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Charge
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/admin/order/trip') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Trip
						</span>
					</a>
				</label>
				{{-- <label class="btn btn-warning">
					<a  href="{{ url('/admin/order/trips') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Trips
						</span>
					</a>
				</label>
				<label class="btn btn-warning">
					<a  href="{{ url('/admin/order/imaging') }}" class="m-menu__link ">
						<span class="d-none d-sm-inline">
							Imaging
						</span>
					</a>
				</label> --}}
			</div>

		</div>
	</div>
</div>
