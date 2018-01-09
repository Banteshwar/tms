<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<div class="col-2 ">
		</div>
		<div class="col-10">
			<label class="m-checkbox">
				{{ Form::checkbox('billing_address', 1, null, ['class'=>'cust_bill_adrs']) }}
				Billing address same as Primary Address
				<span></span>
			</label>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-2 ">
			<label class="col-form-label">Address1<sup>*</sup></label>
		</div>
		<div class="col-10">
			{!! Form::text('address1', null, ['class' => 'form-control m-input','id'=>'city', 'placeholder'=>'Enter Address 1']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-2 ">
			<label class="col-form-label">Address2</label>
		</div>
		<div class="col-10">
			{!! Form::text('address2', null, ['class' => 'form-control m-input','id'=>'city', 'placeholder'=>'Enter Address 2']) !!}
		</div>
	</div>
	<div class="form-group m-form__group row ">
		<label class="col-lg-2 col-form-label">
			City<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('city', null, ['class' => 'form-control m-input','id'=>'city', 'placeholder'=>'Enter City']) !!}

		</div>
		<label class="col-lg-2 col-form-label">
			State/Zip<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('state', null, ['class' => 'form-control m-input','id'=>'state', 'placeholder'=>'State']) !!}
		</div>
		<div class="col-lg-2">
		{!! Form::text('zip', null, ['class' => 'form-control m-input','id'=>'zip', 'placeholder'=>'Zip']) !!}
		</div>
	</div>
	<hr/>
	<div class="form-group m-form__group row">
		<div class="col-2 ">			
		</div>
		<div class="col-10">
			<label class="m-checkbox">
				{{ Form::checkbox('billing_contact', 1, null, ['class'=>'cust_bill_contact']) }}
				Billing contact same as Primary Contact
				<span></span>
			</label>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<div class="col-2 ">
			<label class="col-form-label">Number</label>
		</div>
		<div class="col-10">
			{!! Form::text('same_contact_no', null, ['class' => 'form-control m-input','id'=>'same_contact_no', 'placeholder'=>'Enter Contact No']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-2 ">
			<label class="col-form-label">Fax</label>
		</div>
		<div class="col-10">
			{!! Form::text('same_fax', null, ['class' => 'form-control m-input','id'=>'same_fax', 'placeholder'=>'Enter Fax']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-2 ">
			<label class="col-form-label">Email</label>
		</div>
		<div class="col-10">
			{!! Form::text('same_email', null, ['class' => 'form-control m-input','id'=>'same_email', 'placeholder'=>'Enter Contact Email']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Other Contacts:
		</label>
		<div class="col-lg-10">
			{!! Form::textarea('other_contact', null, ['class' => 'form-control m-input m-input','id'=>'same_other_contact', 'size' => '50x3','placeholder'=>'Other Contacts']) !!}			
		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Notes:
		</label>
		<div class="col-lg-10">
			{!! Form::textarea('notes', null, ['class' => 'form-control m-input m-input','id'=>'same_notes', 'size' => '50x3','placeholder'=>'Notes']) !!}			
		</div>
	</div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
	<div class="m-form__actions">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-10">
				{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
				{{ Form::reset('Cancel', array('class' => 'btn btn-secondary')) }}
			</div>
		</div>
	</div>
</div>