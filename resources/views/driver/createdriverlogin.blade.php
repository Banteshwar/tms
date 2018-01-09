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
                 Create Driver Access
              </h3>
          </div>
      </div>
  </div>
  <!--begin::Form-->

  
  
   {{ Form::open( ['route'=>['driver.add_driverlogin', request()->id],'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
  
  
 
      <div class="m-portlet__body">
          <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
                   {{ Form::label('name', 'Name') }}
              </label>
              <div class="col-lg-6">
                   {{ Form::text('name', '', array('class' => 'form-control')) }}
              </div>
          </div>
          <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
                   {{ Form::label('email', 'Email') }}
              </label>
              <div class="col-lg-6">
                   {{ Form::email('email', '', array('class' => 'form-control')) }}
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
      </div>
      <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions--solid">
              <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-6">
                      {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                     
                  </div>
              </div>
          </div>
      </div>
      {{ Form::close() }}
        <!--end::Form-->
  </div>
@endsection