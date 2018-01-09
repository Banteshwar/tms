@php
		$arrChkList  =  [];
	if(!empty($arrCheckList->check_list_data)) {
		$arrChkList = unserialize($arrCheckList->check_list_data) ?? '';
	} else {
		$arrChkList = [];
	}

@endphp

<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<div class="col-md-6">
			<div class="m-form__heading">
				<h3 class="m-form__heading-title">
					At Time of Hire
				</h3>
			</div>
			<div class="m-checkbox-list">
				@foreach ($checklist as $checkdata)
						@php
								$checked = '';
							if(in_array($checkdata, $arrChkList)) :
								$checked = 'checked';
							endif;
						@endphp

					<label class="m-checkbox">
						<input type="checkbox" name="attimeofhire[]" value="{{ $checkdata }}" {{ $checked }}>
							{{ $checkdata }}
						<span></span>
					</label>
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions--solid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-10">
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