@php
		$arrChkList  =  [];
	if(!empty($billingOtherDetails->attach_these)) {
		$arrChkList = unserialize($billingOtherDetails->attach_these) ?? '';
	} else {
		$arrChkList = [];
	}
@endphp

<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<div class="col-4 ">
			<label class="col-form-label">Invoice Terms</label>
		</div>
		<div class="col-8">
			{{ Form::select('invoive_term', ['Due on receipt' => 'Due on receipt', 'Net 7' => 'Net 7', 'Net 15' => 'Net 15', 'Net 21' => 'Net 21', 'Net 30' => 'Net 30', 'Net 45' => 'Net 45', 'Net 60' => 'Net 60'], null, ['class' => 'form-control m-input m-input--square'])
			}}

		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-4 ">
			<label class="col-form-label">Invoice Send By</label>
		</div>
		<div class="col-8">
			<div class="m-radio-inline">
				<label class="m-radio"> {{ Form::radio('invoice_send_by', 'paper', true) }}Paper
					<span></span>
				</label> 
				<label class="m-radio">{{ Form::radio('invoice_send_by', 'email') }}Email
					<span></span>
				</label> 
				<label class="m-radio">
					{{ Form::radio('invoice_send_by', 'online') }}Online
					<span></span>
				</label> 
			</div>

		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-4 ">
			<label class="col-form-label">If setting by location:</label>
		</div>
		<div class="col-8">

			{{ Form::select('location', ['CA' => 'CA'],
									    null, 
										['class' => 'form-control m-input m-input--square'])   
			}}

		</div>
	</div>

	<div class="m-form__group form-group row">
		<label class="col-4 col-form-label">
			Attach these to Invoices<sup>*</sup>
		</label>
		<div class="col-8">
			<div class="m-checkbox-list">

				@php
					$arrAttachThese = ['Bill of Lading', 'Delivery Order', 'Email', 'Miscellaneous','Proof of Delivery', 'TIR - Chassis', 'TIR - IN', 'Dock Receipt', 'Packing Slip'];
				@endphp

				@foreach ($arrAttachThese as $strAttachThese)
					@php
							$checked = '';
						if(in_array($strAttachThese, $arrChkList)) :
							$checked = true;
						endif;
					@endphp

					<label class="m-checkbox">
						{{ Form::checkbox('attach_these[]', $strAttachThese, $checked) }} {{ $strAttachThese }}
						<span></span>
					</label>
				@endforeach

			</div>
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-4 ">
			<label class="col-form-label">Attention Invoice To</label>
		</div>
		<div class="col-8">

			{!! Form::text('attention_invoice', null, ['class' => 'form-control m-input','id'=>'attention_invoice', 'placeholder'=>'Enter Attention Invoice To']) !!}
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-4  ">
			<label class="col-form-label">Batch Billing?</label>
		</div>
		<div class="col-8">
			<div class="m-checkbox-inline">
				<label class="m-checkbox">
					{{ Form::checkbox('batch_billing', 'yes') }} Yes, ALL loads in a Batch must be delivered before billing
					<span></span>
				</label>									
			</div>								
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-4 ">
			<label class="col-form-label">Send Invoice to this Email </label>
		</div>
		<div class="col-8">
			{!! Form::text('send_invoice_to', null, ['class' => 'form-control m-input','id'=>'send_invoice_to', 'placeholder'=>'To']) !!}
		</div>

		<div class="col-4 ">
			<label class="col-form-label"> </label>
		</div>
		<div class="col-8">
			{!! Form::text('send_invoice_cc', null, ['class' => 'form-control m-input','id'=>'send_invoice_cc', 'placeholder'=>'CC']) !!}
		</div>
	</div>
	<div class=" m-portlet__foot m-portlet__foot--fit">
		<div class="m-form__actions" style=" margin-top: 20px;">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-10">
					{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
					{{ Form::reset('Cancel', array('class' => 'btn btn-secondary')) }}
				</div>
			</div>
		</div>
	</div>
</div>