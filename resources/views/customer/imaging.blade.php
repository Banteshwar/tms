@extends('layouts.backend')
@section('content')
@include('customer.top_menu')

	<div class="m-content">
		<div class="row">
			<div class="col-md-6">
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
	    		$customer_id = '';
	    	if (\Session::has('customer_edit_id')):
        		$customer_id = \Session::get('customer_edit_id');
    		else:
    			echo "you don't have rights to fill this";
    		endif;
	    @endphp

		{{ Form::open(['route' => 'customer.uploaddocuments', 'class' => 'm-form m-form--fit m-form--label-align-right','files'=>true]) }}

		@if($customer_id)
			<input name="customer_id" type="hidden" value="{{ $customer_id }}"/>
		@endif

		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<div class="col-lg-6">
					<div class="form-group m-form__group row">										
						{{ Form::select('document_type', 
							[ 'Contract' => 'Contract',
							  'Credit Application' =>'Credit Application'
							],
						    null, 
							['class' => 'form-control m-select2','id' => 'm_select2_1'])
						}}
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

			<div class="col-md-6">
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
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
							@forelse($upload_document as $upload_data)
						        <tr>
						        	<td>{{ $loop->iteration }} </td>
							        <td>{{ $upload_data->document_type}}</td>
								    <td><a target="_blank" href="{{ asset('uploads/customers/'.$customer_id .'/' .$upload_data->filename) }}"> {{ $upload_data->document_type}} </a></td>
							        <td>
							        	<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
							        		{{-- <i class="la la-trash"></i> --}}
							        		{!! Form::open(['method' => 'DELETE','route' => ['customer.deleteDocument', $upload_data->id],'style'=>'display:inline', 'onsubmit' => 'return confirm("Do you want to delete this item?")']) !!}
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