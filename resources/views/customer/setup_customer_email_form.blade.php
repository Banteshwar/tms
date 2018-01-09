@php
        $arrChkList  =  [];
    if(!empty($customerEmail->inline_checkbox)) {
        $arrChkList = unserialize($customerEmail->inline_checkbox) ?? '';
    } else {
        $arrChkList = [];
    }

    $arrInlineCheckbox = ['Container Status - all events', 'Rail Billing Request'];

@endphp

 <div class="form-group m-form__group row">
    <label class="col-lg-4 col-form-label">
        TO Email Address(s):
    </label>
    <div class="col-lg-7">
        {{ Form::text('to_email_address', null, ['class'=>'form-control m-input', 'placeholder'=>'Enter Email Address(s)']) }}
     </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-4 col-form-label">CC Email Address(s)</label>
    <div class="col-lg-7">
        {{ Form::text('cc_email_address', null, ['class'=>'form-control m-input', 'placeholder'=>'Enter CC Email Address(s)']) }}
     </div>
</div>
<div class="m-form__group form-group row">
    <label class="col-4 col-form-label">
        Inline Checkboxes  
    </label>
    <div class="col-7">
        <div class="m-checkbox-inline">
            @foreach ($arrInlineCheckbox as $checkdata)
                    @php
                            $checked = '';
                        if(in_array($checkdata, $arrChkList)) :
                            $checked = 'checked';
                        endif;
                    @endphp

                <label class="m-checkbox">
                    <input type="checkbox" name="inline_checkbox[]" value="{{ $checkdata }}" {{ $checked }}>
                        {{ $checkdata }}
                    <span></span>
                </label>
            @endforeach
        </div>                                                        
    </div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
        <button type="reset" class="btn btn-secondary">
            Cancel
        </button>
    </div>
</div>