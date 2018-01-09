@extends('layouts.backend')

@section('content')
<div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Edit {{$user->name}}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Form-->

                                      {{ Form::model($user, array('route' => array('driver.edit_driverlogin', $user->id), 'method' => 'POST','class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed')) }}
									  
									    <input type="hidden" name="driver_id" value="{{ $did }}">
                                  
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('name', 'Name') }}
                                                </label>
                                                <div class="col-lg-6">
                                                     {{ Form::text('name', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                      {{ Form::label('email', 'Email') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                            

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('password', 'Password') }}
                                                </label>
                                                <div class="col-lg-6">
                                                     {{ Form::password('password', array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                             <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                       {{ Form::label('password', 'Confirm Password') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                                                </div>
                                            </div>
											
											<div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                       {{ Form::label('status', 'Status') }} 
                                                </label>
                                                <div class="col-lg-6">
												
												  @if($user->active==1)
                                                  {{ Form::radio('active',1,true) }} Active
											       @else
												   {{ Form::radio('active',1,false) }} Active 
                                                   @endif
												   
                                                   @if($user->active==0)												   
                                                  {{ Form::radio('active',0,true) }} In-Active
											         @else
													{{ Form::radio('active',0,false) }} In-Active
												    @endif	
                                                </div>
                                            </div>
                                           
                                                

                                        </div>
                                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                            <div class="m-form__actions m-form__actions--solid">
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-6">
                                                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                 {{ Form::close() }}
                                    <!--end::Form-->
									<div style="text-align: center;">
									<h2 class="m-portlet__head-text">
                                                   Account History
                                                </h2>
								
								<table  width="100%">
<thead>
<tr><td title="Date"><b>Date</b></td>
<td title="Action"><b>Action</b></td>
<td title="By"><b>By</b></td>


</tr>
</thead>

<tbody>
@foreach ($user_log as $user)
<tr>

<td>{{ $user->change_date }} </td>
<td>{{ $user->action_desc }}</td>
<td>{{ $user->by_email }}</td>

</tr>
    @endforeach                
               
                  
                </tbody>
            </table>
			
			</div>
                                </div>
								
@endsection
