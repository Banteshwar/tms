<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
            Full Name<sup>*</sup>
        </label>
        <div class="col-lg-8">
            {!! Form::text('full_name', null, ['class' => 'form-control m-input','id'=>'full_name', 'placeholder'=>'Enter Full Name']) !!}
         </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
           Started Date<sup>*</sup>
        </label>
        <div class="col-lg-8 input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" > 
        {!! Form::text('started_date', null, ['class' => 'form-control m-input','id'=>'started_date', 'placeholder'=>'Enter Started Date']) !!}

            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div>  
        
    </div>


    <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
            Credit Limit $<sup>*</sup>
        </label>
        <div class="col-lg-8">

            {!! Form::text('credit_limit', null, ['class' => 'form-control m-input','id'=>'credit_limit', 'placeholder'=>'Enter Credit Limit $']) !!}

        </div>
        
    </div>

    <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
           Balance Outstanding $<sup>*</sup>
        </label>
        <div class="col-lg-8">

            {!! Form::text('balance_outstanding', null, ['class' => 'form-control m-input','id'=>'balance_outstanding', 'placeholder'=>'Enter Balance Outstanding $']) !!}

         </div>
        
    </div>


    <div class="form-group m-form__group row">
        
        <label class="col-lg-3 col-form-label">
            Credit Alert at %<sup>*</sup>
        </label>
        
        <div class="col-lg-8">
           {!! Form::text('credit_alert', null, ['class' => 'form-control m-input','id'=>'credit_alert', 'placeholder'=>'Enter Credit Alert']) !!}
         </div>
    </div>

     <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
           Customer Status:
        </label>
        <div class="col-lg-8">
           <div class="m-radio-inline">
                <label class="m-radio">
                    {{ Form::radio('customer_status', '1', true) }}
                    Active
                    <span></span>
                </label>
                <label class="m-radio">
                    {{ Form::radio('customer_status', '0') }}
                    InActive
                    <span></span>
                </label>
                
            </div>

        </div>
        
    </div>
     <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
          # of grace loads<sup>*</sup>
        </label>
            <div class="col-lg-9">
                <div class="col-lg-3">
                    {{ Form::text('grace_load', null, ['class' => 'form-control m-input']) }}
                </div>
                <div class="col-lg-3">
                    <span class="m-form__remaining">Remaining</span> 
                </div>
            <span class="m-form__help">Allow few grace loads? (Use this when the customer is inactive)
            </span>
        </div>    
    </div>
    <div class="form-group m-form__group row">
        <label class="col-lg-3 col-form-label">
           Comments<sup>*</sup>
        </label>
        <div class="col-lg-8">
            {{ Form::textarea('Comments', null, ['class' => 'form-control m-input', 'id' => 'Comments', 'size' => '30x3']) }}
        </div>
        
    </div>
</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                {{ Form::Submit('Submit', ['class' => 'btn btn-success']) }}
                {{ Form::reset('Cancel', ['class' => 'btn btn-secondary']) }}
            </div>
        </div>
    </div>
</div>  