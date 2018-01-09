{{ Form::hidden('order_id', session()->get("order_edit_id")) }}
<div class="m-portlet__body">
		<div class="form-group m-form__group row">								
			<div class="col-12">
				<label class="col-form-label">
					What are we doing at this location
				</label>
				<div class="m-radio-inline">
                    
                    @foreach($work_on_locations as $work_location)
                    	
                    <label class="m-radio">
                    {{ Form::radio('doing_in_location', $work_location->id , ($loop->index == 0) ? true : false ) }}
                        {{$work_location->work_name}}
                        <span></span>
                    </label>
                    
                    @endforeach
                    
                </div>
			</div>
		</div>
		<hr/>
		<div class="form-group m-form__group row">
			<div class="col-3 ">
				<label class="col-form-label">Location Name<sup>*</sup></label>
			</div>
			<div class="col-9">

				{!! Form::text('location_name', null, ['class' => 'form-control m-input','id'=>'location_name', 'placeholder'=>'Enter Location Name']) !!}
			</div>
		</div>

		<div class="form-group m-form__group row">
			<div class="col-3 ">
				<label class="col-form-label">Address<sup>*</sup></label>
			</div>
			<div class="col-9">
				
				{!! Form::text('address', null, ['class' => 'form-control m-input','id'=>'address', 'placeholder'=>'Enter Address']) !!}
			</div>
		</div>
		<div class="form-group m-form__group row">
			<div class="col-3">
				<label class="col-form-label">
					City/State/Zip<sup>*</sup>
				</label>
			</div>
			<div class="col-lg-3">

				{!! Form::text('city', null, ['class' => 'form-control m-input','id'=>'city', 'placeholder'=>'Enter City']) !!}

			</div>
			
			<div class="col-lg-3">
				{!! Form::text('state', null, ['class' => 'form-control m-input','id'=>'state', 'placeholder'=>'State']) !!}
			</div>
			<div class="col-lg-3">

			{!! Form::text('zip', null, ['class' => 'form-control m-input','id'=>'zip', 'placeholder'=>'Zip']) !!}
			</div>
		</div>
		<hr/>
		<div class="form-group m-form__group row">
			<div class="col-4">
				<label class="col-form-label">
					Appointment Date<sup>*</sup>
				</label>
			</div>
			<div class="col-lg-8">
				<div class="input-group date" id="m_datetimepicker_5" >
					
					{!! Form::text('appointment_date', null, ['class' => 'form-control m-input','id'=>'appointment_date', 'placeholder'=>'Appointment Date']) !!}
					<span class="input-group-addon">
						<i class="la la-calendar glyphicon-th"></i>
					</span>

				</div>
				
			</div>
		</div>

		<div class="form-group m-form__group row">
			<div class="col-4 ">
				<label class="col-form-label">Contact Name<sup>*</sup></label>
			</div>
			<div class="col-8">

				{!! Form::text('contact_name', null, ['class' => 'form-control m-input','id'=>'contact_name', 'placeholder'=>'Enter Contact Name']) !!}
				
			</div>
		</div>

		<div class="form-group m-form__group row">
			<div class="col-4 ">
				<label class="col-form-label">Phone</label>
			</div>
			<div class="col-8">

				{!! Form::text('phone', null, ['class' => 'form-control m-input','id'=>'phone', 'placeholder'=>'Enter Phone']) !!}
				
			</div>
		</div>

		<div class="form-group m-form__group row">
			<div class="col-4 ">
				<label class="col-form-label">
					Notes Such as Driving Directions:
				</label>
			</div>
			<div class="col-lg-8">
				{!! Form::textarea('driving_direction', null, ['class' => 'form-control m-input m-input','id'=>'driving_direction', 'size' => '50x3','placeholder'=>'Notes Such as Driving Directions']) !!}
				
			</div>
		</div>

		<div class="form-group m-form__group row">
			<div class="col-4 ">
				<label class="col-form-label">Confirmation No<sup>*</sup></label>
			</div>
			<div class="col-8">

				{!! Form::text('confirmation_no', null, ['class' => 'form-control m-input','id'=>'confirmation_no', 'placeholder'=>'Enter Confirmation No ']) !!}
				
			</div>
		</div>
		<div class="form-group m-form__group row">
			<div class="col-4 ">
				<label class="col-form-label">Stop-off?</label>
			</div>
			<div class="col-lg-8">
				<div class="m-radio-inline">
					<label class="m-radio">
					{{ Form::radio('stop_off', 'Not a stop-off', true) }}
						Not a stop-off
						<span></span>
					</label>
					<label class="m-radio">
					{{ Form::radio('stop_off', 'Yes, a stop-off') }}
						 Yes, a stop-off
						<span></span>
					</label>
					
				</div>
			</div>
		</div>

		<div class="form-group m-form__group row">
			<div class="col-4 ">
				<label class="col-form-label">Instruction to the Driver</label>
			</div>
			<div class="col-lg-8">
				{!! Form::textarea('driver_instruction', null, ['class' => 'form-control m-input','id'=>'driver_instruction', 'size' => '50x3','placeholder'=>'Instruction to the Driver']) !!}
			</div>
		</div>


	</div>
	<div class="m-portlet__foot m-portlet__foot--fit">
		<div class="m-form__actions">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-10">
					<button type="submit" class="btn btn-success">
						Submit
					</button>
					<button type="reset" class="btn btn-secondary">
						Cancel
					</button>
				</div>
			</div>
		</div>
	</div>