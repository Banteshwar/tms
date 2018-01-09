<div class="m-portlet__body">
    <div class="m-form__group form-group">
		<label for="">
			Truck Type
		</label>
		<div class="m-radio-inline">
			<label class="m-radio">
				{{ Form::radio('truck_type', '1', true) }}
				Owner Operator Truck
				<span></span>
			</label>
			<label class="m-radio">
				{{ Form::radio('truck_type', '2') }}
				Company Truck
				<span></span>
			</label>				
		</div>
	</div>
	<div class="form-group m-form__group">
		<label for="terminal">
			Terminal
		</label>
		{{  Form::select('terminal', $terminals, null, ['class'=>'form-control m-input m-input--square', 'id' => 'terminal']) }}
	</div>
	
	<div class="form-group m-form__group">
        <label for="owner">
            Owner
        </label>
        {{  Form::select('Owner', $owners, null, ['class'=>'form-control m-input m-input--square', 'id' => 'owner']) }}                                               
    </div>

	<div class="form-group m-form__group">
		<label for="Current Driver">
			Current Driver
		</label>
		{{  Form::select('current_driver', $arrDriver, null, ['class'=>'form-control m-input m-input--square', 'id' => 'current_driver']) }}
	</div>
	<div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12">
            Model / Year<sup>*</sup>
        </label>
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="row align-items-center">
                <div class="col-4">
                    {{ Form::text('model', null, ['class'=>'form-control', 'id'=> 'model', 'placeholder'=>'Model']) }}
                </div>

                <div class="col-4">                                                            
                    {{ Form::text('year', null, ['class'=>'form-control', 'id'=> 'year', 'placeholder'=>'Year']) }}
                </div>                                                    
            </div>                                                    
        </div>
    </div>

	<div class="form-group m-form__group">
		<label for="vin_no">
			VIN No<sup>*</sup>
		</label>
		{{ Form::text('vin_no', null, ['class'=>'form-control', 'id'=> 'vin_no', 'placeholder'=>'VIN No']) }}
	</div>

	<div class="form-group m-form__group row">
        <label class="col-form-label col-lg-4 col-sm-12">
            License Plate No / State<sup>*</sup>
        </label>
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row align-items-center">
                <div class="col-6">
                	{{ Form::text('license_plate_no', null, ['class'=>'form-control', 'id'=> 'license_plate_no', 'placeholder'=>'License Plate No']) }}                                                        
                </div>

                <div class="col-6">
                	{{ Form::text('state', null, ['class'=>'form-control', 'id'=> 'state', 'placeholder'=>'state']) }}                                                                                                                    
                </div>
            </div>
        </div>
    </div>

	<div class="form-group m-form__group">
		<label for="service_start_date">
			Service Start Date<sup>*</sup>
		</label>
		<div data-date-format="yyyy-mm-dd" class="input-group date" id="m_datepicker_3">
			{{ Form::text('service_start_date', null, ['class'=>'form-control', 'id'=> 'state', 'placeholder'=>'Service Start Date']) }}
            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div> 	
	</div>

	<div class="form-group m-form__group">
		<label for="reg_expires_on">
			Registration Expires on<sup>*</sup>
		</label>
		<div data-date-format="yyyy-mm-dd" class="input-group date" id="m_datepicker_3">
			{{ Form::text('reg_expires_on', null, ['class'=>'form-control', 'id'=> 'reg_expires_on']) }}
            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div> 	
	</div>

	<div class="form-group m-form__group">
		<label for="service_start_date">
			Annual Inspection Expires on<sup>*</sup>
		</label>
		<div data-date-format="yyyy-mm-dd" class="input-group date" id="m_datepicker_3">
			{{ Form::text('anul_insp_expir_on', null, ['class'=>'form-control m-input', 'id'=> 'anul_insp_expir_on']) }}
            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div> 	
	</div>

	<div class="form-group m-form__group">
		<label for="service_start_date">
			Quarterly Inspection Expires on<sup>*</sup>
		</label>
		<div data-date-format="yyyy-mm-dd" class="input-group date" id="m_datepicker_3">
			{{ Form::text('quart_inst_expir', null, ['class'=>'form-control m-input', 'id'=> 'quart_inst_expir']) }}
            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div> 	
	</div>

	<div class="form-group m-form__group">
		<label for="service_start_date">
			Bobtail Insurance Expires on<sup>*</sup>
		</label>
		<div data-date-format="yyyy-mm-dd" class="input-group date" id="m_datepicker_3">                                                    
            {{ Form::text('bobtl_insur_expir', null, ['class'=>'form-control m-input', 'id'=> 'bobtl_insur_expir']) }}
            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div> 	
	</div>

	<div class="form-group m-form__group">
		<label for="comments">
			Comments
		</label>
		{{ Form::textarea('comments', null, ['size' => '30x3', 'class' => 'form-control m-input', 'placeholder' => 'Comment']) }}
	</div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
	<div class="m-form__actions">
		<button type="submit" class="btn btn-primary">
			Save
		</button>
	</div>
</div>