<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Address1<sup>*</sup>
		</label>
		<div class="col-lg-4">			
			{!! Form::text('address1', null, ['class' => 'form-control m-input','id'=>'address1', 'placeholder'=>'Enter Address1']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			Address2:
		</label>
		<div class="col-lg-4">
			{!! Form::text('address2', null, ['class' => 'form-control m-input','id'=>'address2','placeholder'=>'Enter Address2']) !!}
		</div>
	</div>	
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			City<sup>*</sup>
		</label>
		<div class="col-lg-4">
			{!! Form::text('city', null, ['class' => 'form-control m-input','id'=>'city', 'placeholder'=>'Enter City']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			State/Zip<sup>*</sup>
		</label>
		<div class="col-lg-2">
			{!! Form::text('state', null, ['class' => 'form-control m-input','id'=>'state', 'placeholder'=>'Enter State']) !!}
		</div>
		<div class="col-lg-2">
			{!! Form::text('zip', null, ['class' => 'form-control m-input','id'=>'zip', 'placeholder'=>'Enter Zip']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Tool Free
		</label>
		<div class="col-lg-4">
			{!! Form::text('tollfree', null, ['class' => 'form-control m-input','id'=>'tollfree', 'placeholder'=>'Enter Tool Free']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			Contact Number
		</label>
		<div class="col-lg-4">
			{!! Form::text('contact_number', null, ['class' => 'form-control m-input','id'=>'contact_number', 'placeholder'=>'Enter contact number']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Contact Email<sup>*</sup>
		</label>
		<div class="col-lg-4">
			{!! Form::text('email', null, ['class' => 'form-control m-input','id'=>'email', 'placeholder'=>'Enter Contact Email']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			Fax:
		</label>
		<div class="col-lg-4">
			{!! Form::text('fax', null, ['class' => 'form-control m-input','id'=>'fax', 'placeholder'=>'Enter Fax']) !!}
		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Other Contacts:
		</label>
		<div class="col-lg-10">
			{!! Form::textarea('other_contact', null, ['class' => 'form-control m-input m-input','id'=>'other_contact', 'size' => '50x3','placeholder'=>'Other Contacts']) !!}
		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Notes:
		</label>
		<div class="col-lg-10">
			{!! Form::textarea('notes', null, ['class' => 'form-control m-input m-input','id'=>'notes', 'size' => '50x3','placeholder'=>'Notes']) !!}
		</div>
	</div>
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions--solid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-10">
				{{ Form::Submit('Submit', ['class'=>"btn btn-success"]) }}
				{{ Form::reset('Cancel', ['class'=>"btn btn-secondary"]) }}
			</div>
		</div>
	</div>
</div>