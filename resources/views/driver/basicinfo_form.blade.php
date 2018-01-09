<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<label class="col-lg-1 col-form-label">
			Terminal:
		</label>
		<div class="col-lg-3">
			{{ Form::select( 'terminalid',  $terminals, null,  ['class' => 'form-control m-input m-input--square'] )  }}
		</div>
		<label class="col-lg-2 col-form-label">
			Owner Operator - Link
		</label>
		<div class="col-lg-6">
			<div class="m-radio-inline">
				<label class="m-radio"> {{ Form::radio('downer', 'Owner Operator', true) }}Owner Operator
					<span></span>
				</label> 
				<label class="m-radio">{{ Form::radio('downer', 'Not an Owner Operator') }}Not an Owner Operator
					<span></span>
				</label> 
				<label class="m-radio">
					{{ Form::radio('downer', 'Company Driver') }}Company Driver
					<span></span>
				</label> 
			</div>
		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-1 col-form-label">
			First Name<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('dfname', null, ['class' => 'form-control m-input','id'=>'dfname', 'placeholder'=>'Enter First Name']) !!}

		</div>
		<label class="col-lg-1 col-form-label">
			Middle Name
		</label>
		<div class="col-lg-3">
			{!! Form::text('dmname', null, ['class' => 'form-control m-input','id'=>'dmname', 'placeholder'=>'Enter Middle Name']) !!}
		</div>
		<label class="col-lg-1 col-form-label">
			Last Name<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('dlname', null, ['class' => 'form-control m-input','id'=>'dlname', 'placeholder'=>'Enter Last Name']) !!}
		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-1 col-form-label">
		Address<sup>*</sup> 
		</label>
		<div class="col-lg-11">
			{!! Form::text('daddress', null, ['class' => 'form-control m-input','id'=>'daddress', 'placeholder'=>'Enter Address']) !!}
		</div>
		
	</div>
</div>

<div class="form-group m-form__group row">
	<label class="col-lg-1 col-form-label">
		City<sup>*</sup>
	</label>
	<div class="col-lg-3">
		{!! Form::text('dcity', null, ['class' => 'form-control m-input','id'=>'dcity', 'placeholder'=>'Enter City']) !!}

	</div>
	<label class="col-lg-1 col-form-label">
		State<sup>*</sup>
	</label>
	<div class="col-lg-3">
		{!! Form::text('dstate', null, ['class' => 'form-control m-input','id'=>'dstate', 'placeholder'=>'Enter State']) !!}
	</div>
	<label class="col-lg-1 col-form-label">
		Zip<sup>*</sup>
	</label>
	<div class="col-lg-3">
		{!! Form::text('dzip', null, ['class' => 'form-control m-input','id'=>'dzip', 'placeholder'=>'Enter Zip']) !!}
	</div>
</div>
<div class="form-group m-form__group row">
	<label class="col-lg-1 col-form-label">
	Contact No<sup>*</sup> 
	</label>
	<div class="col-lg-3">
		{!! Form::text('dcontact', null, ['class' => 'form-control m-input','id'=>'dcontact', 'placeholder'=>'Enter Contact No']) !!}
	</div>
	<label class="col-lg-1 col-form-label">
		Cell Phone No: 
	</label>
	<div class="col-lg-3">
		{!! Form::text('dcellno', null, ['class' => 'form-control m-input','id'=>'dcellno', 'placeholder'=>'Enter Cell Phone No']) !!}
		
	</div>
	<label class="col-lg-1 col-form-label">
	Phone Carrier:
	</label>
	<div class="col-lg-3">
		{{ Form::select('dphonecarrier', 
				   ['Alltel'  => 'Alltel',
					'AT&T'  => 'AT&T',
					'Boost Mobile'  => 'Boost Mobile',
					'Cricket'  => 'Cricket',
					'Metro PCS'  => 'Metro PCS',
					'Nextel'  => 'Nextel',
					'Ptel'  => 'Ptel',
					'Qwest'  => 'Qwest',
					'Sprint'  => 'Sprint',
					'Straight Talk'  => 'Straight Talk',
					'Suncom'  => 'Suncom',
					'T-Mobile'  => 'T-Mobile',
					'Tracfone'  => 'Tracfone',
					'U.S. Cellular'  => 'U.S. Cellular',
					'Verizon'  => 'Verizon',
					'Virgin Mobile'  => 'Virgin Mobile',
					],
				    null, 
					['class' => 'form-control m-input m-input--square'])   
		}}

	</div>
</div>

<div class="form-group m-form__group row">
	<label class="col-lg-1 col-form-label">
		Email<sup>*</sup>
	</label>
	<div class="col-lg-5">
		{{  form::text('demail', null, ['class'=>'form-control m-input m-input--air', 'id'=>'demail', 'placeholder' => 'Enter Email']) }}
		
	</div>

	<label class="col-lg-1 col-form-label">
		Hire Date<sup>*</sup>
	</label>
	<div class="col-lg-5">
		<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" >
			{{  form::text('dHiredDate', null, ['class'=>'form-control m-input m-input--air', 'id'=>'demail', 'placeholder' => 'Enter Hire Date']) }}
			<span class="input-group-addon">
				<i class="la la-calendar"></i>
			</span>
		</div>
		
	</div>
</div>
<div class="form-group m-form__group row">
	<label class="col-lg-1 col-form-label">
		Comments 
	</label>
	<div class="col-lg-11">
		{!! Form::textarea('dcomments', null, ['class' => 'form-control m-input m-input','id'=>'dcomments', 'size' => '50x3','placeholder'=>'Comments']) !!}
	</div>
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions--solid">
		<div class="row">
			<div class="col-lg-5"></div>
			<div class="col-lg-7">
				<button type="submit" class="btn btn-primary">
					Save
				</button>
				<button type="reset" class="btn btn-secondary">
					Reset
				</button>
			</div>
		</div>
	</div>
</div>