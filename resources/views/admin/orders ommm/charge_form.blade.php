{{ Form::hidden('order_id', session()->get("order_edit_id")) }}
<div class="m-portlet__body">								
	<div class="form-group m-form__group row">
		<div class="col-lg-2 col-form-label">
			<label class="col-form-label">
				Enter Charge:
			</label>
		</div>
		<div class="col-lg-3">
			{{ Form::select('charge_type', 
				[
				'Attemted Pickup' => 'Attemted Pickup',
				'Bonded Cargo Charge' => 'Bonded Cargo Charge',
				'Chassis Rental' => 'Chassis Rental',
				'Chassis Stack' => 'Chassis Stack',
				'Chassy Split' => 'Chassy Split',
				'Demurrage' => 'Demurrage',
				'Detention' => 'Detention',
				'Drayage' => 'Drayage',
				'Driver Assistance ' => 'Driver Assistance ',
				'Drop Charge' => 'Drop Charge',
				'Dry Run' => 'Dry Run',
				'Fuel Surcharge' => 'Fuel Surcharge',
				'Hauling Refrigerated Cargo' => 'Hauling Refrigerated Cargo',
				'Hazardous Materials' => 'Hazardous Materials',
				'Heavy' => 'Heavy ',
				'LTL/ CFS Move' => 'LTL/ CFS Move',
				'Maintenance & Repair' => 'Maintenance & Repair',
				'Other' => 'Other',
				'Per Diem' => 'Per Diem',
				'Permits' => 'Permits',
				'Redelivery Charge' => 'Redelivery Charge',
				'Scale Load' => 'Scale Load',
				'Shipping ' => 'Shipping ',
				'spot Empty' => 'spot Empty',
				'Stop Off' => 'Stop Off',
				'Storage' => 'Storage',
				'Strap/Unstrap' => 'Strap/Unstrap',
				'Tire Rebill' => 'Tire Rebill',
				'Toll' => 'Toll ',
				'Traffic Fines' => 'Traffic Fines',
				'Triaxle' => 'Triaxle',
				'Wash Out Container' => 'Wash Out Container',
				],
			    null, 
				['class' => 'form-control m-input m-input--square'])   
			}}
		</div>
		<div class="col-lg-2">
			{!! Form::text('units', null, ['class' => 'form-control m-input','id'=>'units','placeholder'=>'Units']) !!}
			
		</div>
		<div class="col-lg-2">

			{!! Form::text('rates', null, ['class' => 'form-control m-input','id'=>'rates','placeholder'=>'Rates']) !!}
			
		</div>
		<div class="col-lg-2">

			{!! Form::text('amounts', null, ['class' => 'form-control m-input','id'=>'amounts','placeholder'=>'Amounts']) !!}
			
		</div>

		
	</div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
	<div class="m-form__actions">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-10">
				<button type="submit" class="btn btn-success">
					Add Charge
				</button>
				<button type="reset" class="btn btn-secondary">
					Cancel
				</button>
			</div>
		</div>
	</div>
</div>