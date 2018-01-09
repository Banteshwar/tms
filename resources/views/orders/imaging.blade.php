@extends('layouts.backend')
@section('content')
@include('orders.top_menu')
	<div class="m-content">
		<div class="row">
			<div class="col-md-5">
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Upload Documents/Images
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<!--begin::Form-->
		 @php
	    	/*	$driver_id = '';
	    	if (\Session::has('driver_edit_id')):
        		$driver_id = \Session::get('driver_edit_id');
    		else:
    			echo "you don't have rights to fill this";
    		endif;*/
	    @endphp

		{{ Form::open(['route' => 'driver.uploaddocuments', 'class' => 'm-form m-form--fit m-form--label-align-right','files'=>true]) }}

		{{-- @if($driver_id)
			<input name="driver_id" type="hidden" value="{{ $driver_id }}"/>
		@endif --}}

		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<div class="col-lg-6">
					<div class="form-group m-form__group row">										
						<select class="form-control m-select2" id="m_select2_1" name="document_type">
							<option value="Alcohol & Drug Certification Receip" >Alcohol & Drug Certification Receipt</option> 
                            <option value="Bobtail & Physical Damage Insurance For" >Bobtail & Physical Damage Insurance Form</option> 
                            <option value="CDL/Med Card/SS Car" >CDL/Med Card/SS Card</option> 
                            <option value="Copy of Annual Inspectio" >Copy of Annual Inspection</option> 
                            <option value="Copy of CD" >Copy of CDL</option> 
                            <option value="Copy of Long Form Physica" >Copy of Long Form Physical</option> 
                            <option value="Copy of Medical Car" >Copy of Medical Card</option> 
                            <option value="Copy of Social Security Card" >Copy of Social Security Card </option> 
                            <option value="Copy of Vehicle Registration/Cab Car" >Copy of Vehicle Registration/Cab Card</option> 
                            <option value="Credit Card Usage Agreemen" >Credit Card Usage Agreement</option> 
                            <option value="Driver Applicatio" >Driver Application</option> 
                            <option value="Driver Certification and Annual Revie" >Driver Certification and Annual Review</option> 
                            <option value="Drivers Licens" >Drivers License</option> 
                            <option value="Drug Test Result" >Drug Test Results</option> 
                            <option value="Employment Eligigility Verification - I-" >Employment Eligigility Verification - I-9</option> 
                            <option value="Independent Contractor Agreement(Lease" >Independent Contractor Agreement(Lease)</option> 
                            <option value="Insuranc" >Insurance</option> 
                            <option value="Motor Vehicle Driver's Certification of Violation" >Motor Vehicle Driver's Certification of Violations</option> 
                            <option value="MV" >MVR</option> 
                            <option value="Occupational Acc. Enrollment For" >Occupational Acc. Enrollment Form</option> 
                            <option value="Permit" >Permit </option> 
                            <option value="Previous Employment Histor" >Previous Employment History</option> 
                            <option value="Previous Pre-Employment A & D Test Statemen" >Previous Pre-Employment A & D Test Statement</option> 
                            <option value="Receipt for Driver Handboo" >Receipt for Driver Handbook</option> 
                            <option value="Receipt for FMSCR Pocketboo" >Receipt for FMSCR Pocketbook</option> 
                            <option value="Record of Road Tes" >Record of Road Test</option> 
                            <option value="Registration" >Registration </option> 
                            <option value="Stat. of Policy on Drug & Controlled Substances" >Stat. of Policy on Drug & Controlled Substances </option> 
                            <option value="Statement of On-Duty Hours" >Statement of On-Duty Hours </option> 
                            <option value="Termination Form" >Termination Form </option> 
                            <option value="TWIC Card" >TWIC Card </option> 
                            <option value="Violation & Review Record" >Violation & Review Record </option> 
                            <option value="W9" >W9 </option>
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<label class="custom-file">
						<input type="file" id="file2" name="upload_doc" class="custom-file-input">
						<span class="custom-file-control"></span>
					</label>
				</div>
			</div>
		</div>

		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<input type="submit" value="Submit" class="btn btn-primary">
				<button type="reset" class="btn btn-secondary">
					Cancel
				</button>
			</div>
		</div>
	{{ Form::close() }}


					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>

			<div class="col-md-7">
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Upload Documents
								</h3>
							</div>
						</div>
					</div>
					<table class="table table-condensed">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Document Type</th>
					        <th>Document Link</th>
					        <th width="15%">Action</th>
					      </tr>
					    </thead>
					    <tbody>
							@forelse($upload_document as $upload_data)
						        <tr>
						        	<td>{{ $loop->iteration }} </td>
							        <td>{{ $upload_data->document_type}}</td>
								    <td><a href="{{ url('public/uploads/drivers/'.$driver_id .'/' .$upload_data->filename) }}"> {{ $upload_data->document_type}} </a></td>
							        <td>
							        	<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
							        		{{-- <i class="la la-trash"></i> --}}
							        		{!! Form::open(['method' => 'DELETE','route' => ['driver.deleteDocument', $upload_data->id],'style'=>'display:inline', 'onsubmit' => 'return confirm("Do you want to delete this item?")']) !!}
								            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
								            {!! Form::close() !!}
							        	</a>
							        </td>
						      </tr>
						      @empty
						      <tr> <td colspan="4" class="m-portlet__body"> No Records Found! </td> </tr>
							@endforelse
					    </tbody>
					</table>

					
						<!--end::Form-->	
				</div>	
			</div>
		</div>
	</div>
@endsection