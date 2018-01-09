{{ Form::hidden('truck_id', session()->get("truck_insert_id")) }}
<div class="m-portlet__body">
    <div class="m-form__group form-group">
		<label for="">
			Truck<sup>*</sup>
		</label>
		{{ Form::text('truck', null, ['class'=>'form-control', 'id'=> 'truck', 'placeholder'=>'Truck']) }}
	</div>

	 <div class="m-form__group form-group">
		<label for="">
			Track Fuel Usage
		</label>
		<label class="m-checkbox">
			{{ Form::checkbox('track_fuel_usage', 'track fuel usage') }}
			<span></span>
		</label>
	</div>

	<div class="m-form__group form-group">
		<label for="">
			Physical Damage
		</label>			
		<label class="m-checkbox">	
			{{ Form::checkbox('physical_damage', 'physical damage') }}		
			<span></span>
		</label>
		{{ Form::text('physical_damage_text', null, ['class'=>'form-control', 'id'=> 'physical_damage_text', 'placeholder'=>'Physical Damage Text']) }}
	</div>

	 <div class="m-form__group form-group">
		<label for="">
			Non-Trucking Liability (NTL)
		</label>
		<label class="m-checkbox">
			{{ Form::checkbox('non_truck_lib', 'Non-Trucking Liability') }}		
			<span></span>
		</label>
	</div>

	<div class="m-form__group form-group">
		<label for="">
			Calculate IFTA
		</label>
		<label class="m-checkbox">	
			{{ Form::checkbox('calculate_ifta', 'calculate ifta') }}				
			<span></span>
		</label>
		{{ Form::text('calculate_ifta_text', null, ['class'=>'form-control', 'id'=> 'calculate_ifta_text', 'placeholder'=>'Calculate Ifta Text']) }}
	</div>

	<div class="m-form__group form-group">
		<label for="">
			NY HUT
		</label>
		<label class="m-checkbox">
			{{ Form::checkbox('ny_hut', 'ny hut') }}
			<span></span>
		</label>
	</div>

	<div class="m-form__group form-group">
		<label for="">
			Parking at Company Yard
		</label>
		<label class="m-checkbox">
			{{ Form::checkbox('parking_at_compy_yard', 'Parking at Company Yard') }}
			<span></span>
		</label>
	</div>

	<div class="m-form__group form-group">
		<label for="">
			This truck was referred by truck #
		</label>
		{{ Form::text('referred_by_truck', null, ['class'=>'form-control', 'id'=> 'referred_by_truck', 'placeholder'=>'Referred By Truck']) }}
	</div>
</div>

<div class="m-portlet__foot m-portlet__foot--fit">
	<div class="m-form__actions">
		<button type="submit" class="btn btn-primary">
			Save
		</button>
	</div>
</div>