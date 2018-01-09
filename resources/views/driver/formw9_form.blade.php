<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Name<sup>*</sup>
    </label>
    <div class="col-lg-3">       
        {!! Form::text('name', null, ['class' => 'form-control m-input','id'=>'w9name' ,'placeholder'=>'Enter Name']) !!}
    </div>
    <label class="col-lg-2 col-form-label">
        Bussiness Name<sup>*</sup>
    </label>
    <div class="col-lg-4">
        {!! Form::text('bussiness_name', null, ['class' => 'form-control m-input','id'=>'w9_bussiness_name' ,'placeholder'=>'Enter Bussiness Name']) !!}
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Type<sup>*</sup>
    </label>
    <div class="col-lg-5">
        <div class="m-radio-inline" id="type">
            <label class="m-radio">
                {{ Form::radio('type', 'Sole proprietor', true) }}
                  Sole proprietor 
                <span></span>
            </label>
            <label class="m-radio">
                {{ Form::radio('type', 'Partnership') }}
                Partnership 
                <span></span>
            </label>
            <label class="m-radio">
                {{ Form::radio('type', 'Corporation') }}
                Corporation <span></span>
            </label>
             <label class="m-radio">
                {{ Form::radio('type', 'Other') }}
                Other <span></span>
            </label>
        </div>
    </div>
    <div class="col-lg-4">
        {!! Form::text('type_other', null, ['class' => 'form-control m-input','id'=>'type_other' ,'placeholder'=>'Enter Other Value', 'style'=>'display:none;']) !!}
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        City/State/Zip:
    </label>
    <div class="col-lg-3">
        {!! Form::text('city', null, ['class' => 'form-control m-input','id'=>'city' ,'placeholder'=>'Enter your City']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::text('state', null, ['class' => 'form-control m-input','id'=>'state' ,'placeholder'=>'Enter your State']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::text('zip', null, ['class' => 'form-control m-input','id'=>'zip' ,'placeholder'=>'Enter Your Zip']) !!}
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        TIN:
    </label>
    <div class="col-lg-3">
        <div class="m-radio-inline">
            <label class="m-radio m-radio">
                 {{ Form::radio('tin', 'Social Sec#', true) }}Social Sec#
                 <span></span>
            </label>

            <label class="m-radio m-radio">
                 {{ Form::radio('tin', 'Social Sec#') }}Employer ID#
                <span></span>
            </label>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="m-input-icon m-input-icon--right">
           {!! Form::text('ssn', null, ['class' => 'form-control m-input','id'=>'ssn' ,'placeholder'=>'Enter your SSN']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="m-input-icon m-input-icon--right">
            {!! Form::text('ein', null, ['class' => 'form-control m-input','id'=>'ein' ,'placeholder'=>'Enter your EIN']) !!}
        </div>
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Paid By:
    </label>
    <div class="col-lg-3">
        <div class="m-radio-inline">
            <label class="m-radio m-radio">
                 {{ Form::radio('paidby', 'Check', true) }}Check
                <span></span>
            </label>
            <label class="m-radio m-radio">
                 {{ Form::radio('paidby', 'Direct Deposit') }}Direct Deposit
                <span></span>
            </label>
        </div>
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Comments:
    </label>
    <div class="col-lg-9">
        {!! Form::textarea('comments', null, ['class' => 'form-control m-input m-input','id'=>'comments','size' => '50x3','placeholder'=>'Comments']) !!}
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
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>