<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Social Security No<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('social_security_no', null, ['class' => 'form-control m-input','id'=>'social_security_no', 'placeholder'=>'Enter Social Security No']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			Date of Birth<sup>*</sup>
		</label>
		<div class="col-lg-3">
			
			<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" >
				{!! Form::text('dob', null, ['class' => 'form-control m-input','id'=>'dob', 'placeholder'=>'Enter Date of Birth']) !!}
				<span class="input-group-addon">
					<i class="la la-calendar"></i>
				</span>
			</div>												
		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			CDL(Commercial Driving License) <sup>*</sup>
		</label>
		<div class="col-lg-3">
			
			{!! Form::text('cdl', null, ['class' => 'form-control m-input','id'=>'cdl', 'placeholder'=>'Enter CDL(Commercial Driving License)']) !!}


		</div>
		<label class="col-lg-2 col-form-label">
			State<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('dstate', null, ['class' => 'form-control m-input','id'=>'dstate', 'placeholder'=>'Enter State']) !!}


		</div>
	</div>
	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			CDL Expires on<sup>*</sup>
		</label>
		<div class="col-lg-3">
			<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" >
				{!! Form::text('cdl_exp_on', null, ['class' => 'form-control m-input','id'=>'cdl_exp_on', 'placeholder'=>'Enter CDL Expires on']) !!}

				<span class="input-group-addon">
					<i class="la la-calendar"></i>
				</span>
			</div>	
		</div>
		<label class="col-lg-2 col-form-label">
			CDL HazMat
		</label>

		<div class="col-lg-3">
			<div class="m-radio-inline">
				<label class="m-checkbox">
					{{ Form::checkbox('cdlHaz', 'CDL HazMat') }}
					<span></span>
				</label>
				
			</div>
			
		</div>

	</div>

	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Medical Certificate Expires on
				</h3>
			</div>
		</div>
	</div>



	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Medical Card<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('medical_card', null, ['class' => 'form-control m-input','id'=>'medical_card', 'placeholder'=>'Enter Medical Card #']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			Medical Card Expires on<sup>*</sup>
		</label>
		<div class="col-lg-3">

			<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" >
				{!! Form::text('medical_exp_on', null, ['class' => 'form-control m-input','id'=>'medical_exp_on', 'placeholder'=>'Enter Medical Card Expires on']) !!}
				<span class="input-group-addon">
					<i class="la la-calendar"></i>
				</span>
			</div>	
		</div>	
	</div>

	<div class="form-group m-form__group row">
		<label class="col-lg-2 col-form-label">
			Insurance<sup>*</sup>
		</label>
		<div class="col-lg-3">

			{{ Form::select('insurance', 
							['NAIT' => 'NAIT',
							'Other OcAc' => 'Other OcAc',
							'Workers Comp' => 'Workers Comp',
							'None' => 'None'],
				    		null, 
							['class' => 'form-control m-input m-input--square'])   
			}}

		</div>
		<div class="col-lg-3">															
			<div class="m-checkbox-inline">
				@php
					$arrInsuranceExtra = ['OccAcc', 'NTL', 'PD']; 
					$arrDriverLiceneInfo = []; 
					if(!empty($driverLiceneInfo->insurance_extra)) {
						$arrDriverLiceneInfo = unserialize($driverLiceneInfo->insurance_extra);
					}

				@endphp


				@foreach($arrInsuranceExtra as $strInsuranceExtra)
					@php
							$checked = '';
						if(in_array($strInsuranceExtra, $arrDriverLiceneInfo)) :
							$checked = 'true';
						endif;
					@endphp

					<label class="m-checkbox">
						{{ Form::checkbox('insurance_extra[]', $strInsuranceExtra, $checked) }}
						  {{ $strInsuranceExtra }} 
						<span></span>
					</label>
				@endforeach	
			</div>			
		</div>		

	</div>

	<div class="form-group m-form__group row">

		<label class="col-lg-2 col-form-label">
			TWIC Card<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('twic_card', null, ['class' => 'form-control m-input','id'=>'twic_card', 'placeholder'=>'Enter TWIC Card #']) !!}
		</div>
		<label class="col-lg-2 col-form-label">
			TWIC Card Expires on<sup>*</sup>
		</label>
		<div class="col-lg-3">
			<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" >
					{!! Form::text('twic_exp_on', null, ['class' => 'form-control m-input','id'=>'twic_exp_on', 'readonly' => '' ,'placeholder'=>'Enter TWIC Card Expires on']) !!}
					<span class="input-group-addon">
						<i class="la la-calendar"></i>
					</span>
			</div>	
		</div>	
	</div>

	<div class="form-group m-form__group row">

		<label class="col-lg-2 col-form-label">
			Sealink Expiration Date<sup>*</sup>
		</label>
		<div class="col-lg-3">
			<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" >
					{!! Form::text('sealink_exp_on', null, ['class' => 'form-control m-input','id'=>'sealink_exp_on', 'readonly' => '' ,'placeholder'=>'Enter Sealink Expiration Date']) !!}
					<span class="input-group-addon">
						<i class="la la-calendar"></i>
					</span>
			</div>	
		</div>
		<label class="col-lg-2 col-form-label">
			Fleet_One Driver<sup>*</sup>
		</label>
		<div class="col-lg-3">
			{!! Form::text('fleet_one', null, ['class' => 'form-control m-input','id'=>'fleet_one', 'placeholder'=>'Enter Fleet_One Driver #']) !!}

		</div>	
	</div>
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions--solid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-10">
				<input type="submit" value="save" class="btn btn-primary">
				<input type="reset" value="reset" class="btn btn-primary">
			</div>
		</div>
	</div>
</div>