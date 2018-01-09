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
                                                 Add Yard
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Form-->
                                   {{ Form::open(array('url' => 'yards','class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed')) }}
                                        <div class="m-portlet__body">
                                            
                                         
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('location_name', 'Name') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('location_name', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('address', 'Address') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('address', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                            
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('city', 'City') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('city', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                            
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('state', 'State') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('state', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('zip', 'Zip') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('zip', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('phone', 'Phone') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('phone', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('altphone', 'Alt Phone') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('altphone', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('fax', 'Fax') }}
                                                </label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('fax', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>

                                           
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">
                                                     {{ Form::label('guardid', 'Guard') }}
                                                </label>
                                                <div class="col-lg-6">

                                                    {{ Form::select( 'guardid',[null=>'Please Select'] + $gaurds, null,  ['class' => 'form-control m-input m-input--square'] )  }} 
                                                    
                                                   
                                                </div>
                                            </div>
                                           



                                        </div>



                                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                            <div class="m-form__actions m-form__actions--solid">
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-6">
                                                        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                                                        <button type="reset" class="btn btn-secondary" onClick="window.location.href='{{ route('yards.index') }}' ">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                 {{ Form::close() }}
                                    <!--end::Form-->
                                </div>
@endsection