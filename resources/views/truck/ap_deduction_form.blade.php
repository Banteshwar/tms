{{ form::hidden('truck_id', session()->get('truck_insert_id')) }}
<div class="m-portlet__body">
    <div class="m-form__group form-group">
		<label for="account_type">
			Account Type
		</label>
		{{  Form::select('account_type', ['Additonal Escrow' => 'Additonal Escrow', 'Balance Owed' => 'Balance Owed', 'Cash Advance'=> 'Cash Advance', 'Credit Card Charges' => 'Credit Card Charges', 'Escrow accont' => 'Escrow accont', 'Fuel Charges' => 'Fuel Charges', 'Garnishment' => 'Garnishment' ], null, ['class'=>'form-control m-input m-input--square', 'id' => 'account_type']) }}
	</div>

	<div class="form-group m-form__group">
		<label for="openDate">
			Opened Date<sup>*</sup>
		</label>
		<div data-date-format="yyyy-mm-dd" class="input-group date" id="m_datepicker_3">
			{{ Form::text('open_date', null, ['class'=>'form-control m-input']) }}
            <span class="input-group-addon">
                <i class="la la-calendar"></i>
            </span>
        </div>
	</div>

	<div class="form-group m-form__group">
		<label for="frequency">
			Frequency
		</label>
		<div class="m-radio-inline">
			<label class="m-radio">
				{{ Form::radio('frequency', 'weekly', true) }}
				Weekly
				<span></span>
			</label>
			<label class="m-radio">
				{{ Form::radio('frequency', 'monthly') }}
				 monthly
				<span></span>
			</label>
		</div>
	</div>

	<div class="form-group m-form__group row">
       

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row align-items-center">
            	<div class="col-4">
            		 
	            	 <label>
           				 Deduction Amount<sup>*</sup>
       				 </label>
            		{{ Form::text('deduction_amount', null, ['class' => 'form-control m-input', 'id' => 'deduction_amount', 'placeholder' => "Deduction Amount" ]) }}
                </div>

                <div class="col-4">
                	<label>
                        Deduction<sup>*</sup>
                    </label>
                    {{ Form::text('deduction', null, ['class' => 'form-control m-input', 'id' => 'deduction', 'placeholder' => "Deduction" ]) }}	
                </div>

                <div class="col-4">
                	<label>
                        Limit/Cycle $<sup>*</sup>
                    </label>
                    {{ Form::text('limit_cycle', null, ['class' => 'form-control m-input', 'id' => 'limit_cycle', 'placeholder' => "Limit Cycle" ]) }}		
                </div>
            </div>
        </div>
    </div>	

    <div class="form-group m-form__group">
		<label for="maximum_limit">
			Maximum Limit (must be a number.)<sup>*</sup>
		</label>
		{{ Form::text('maximum_limit', null, ['class' => 'form-control m-input', 'id' => 'maximum_limit', 'placeholder' => "Maximum Limit" ]) }}
	</div>		

    <div class="form-group m-form__group">
		<label for="vin_no">
			Total Collected
		</label>
		{{ Form::text('total_collected', null, ['class' => 'form-control m-input', 'id' => 'total_collected', 'placeholder' => "Total Collected" ]) }}
	</div>		

	<div class="m-form__group form-group">
		<label for="disp_tot_coltd">
			Display Total Collected
		</label>
		<label class="m-checkbox">
			{{ Form::checkbox('disp_tot_coltd', 'Display Total Collected') }}
			<span></span> (In Settlements)
		</label>
	</div>

	<div class="m-form__group form-group">
		<label for="start_after">
			Start After
		</label>
		<label class="m-checkbox">
			{{ Form::checkbox('start_after', 'Start After') }}
			<span></span> (after completing the previous ones)
		</label>
	</div>

    <div class="form-group m-form__group">
		<label for="comment_setlmnt">
			Comment to show in settlement
		</label>
		{{ Form::text('comment_setlmnt', null, ['class'=>'form-control', 'id'=> 'comment_setlmnt', 'placeholder'=>'Comment Settlement']) }}
	</div>	

	<div class="form-group m-form__group">
		<label for="comments">
			Comments
		</label>
		{{ Form::textarea('comments', null, ['size' => '30x3', 'id' => 'comments', 'class' => 'form-control m-input', 'placeholder' => 'Comment']) }}
	</div>

	<div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12">
            Accumulate
        </label>
        <div class="col-lg-9 col-md-12 col-sm-12">
        	<div class="row align-items-center">
        		<label class="m-checkbox">
        			{{ Form::checkbox('accumulate', 'accumulate') }}
					<span></span> (when truck is not working)
				</label>
        	</div>	

            <div class="row align-items-center">
                <div class="col-4">
                	<label>
                        Due
                    </label>
                    {{ Form::text('due', null, ['class'=>'form-control', 'id'=> 'physical_damage_text', 'placeholder'=>'Due']) }}
                </div>

                <div class="col-4">
                	<label>
                        Installment $
                    </label>
                    {{ Form::text('installment', null, ['class'=>'form-control', 'id'=> 'installment', 'placeholder'=>'Installment']) }}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group m-form__group">
		<label for="terminal">
			Account Status
		</label>
		<div class="m-radio-inline">
			<label class="m-radio">
				{{ Form::radio('acount_status', 'active', true) }}
				Active
				<span></span>
			</label>
			<label class="m-radio">
				{{ Form::radio('acount_status', 'close') }}
				Closed
				<span></span>
			</label>
		</div>
	</div>

</div>

<div class="m-portlet__foot m-portlet__foot--fit">
	<div class="m-form__actions">
		<button type="submit" class="btn btn-primary">
			Save
		</button>
	</div>
</div>