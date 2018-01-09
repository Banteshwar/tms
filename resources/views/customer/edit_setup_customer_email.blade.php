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
                                   Setup customer email notification here 
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::Section-->
                        <div class="m-section">
                            <h6 class="m-portlet__head-title m-portlet__head-text">
                                Add New
                            </h6>
                            <div class="m-section__content">
                                <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                    <div class="m-demo__preview">
                                        <!--begin::Form-->
                                        {{ Form::model($customerEmail, ['route'=>['customer.updateSetupCustomerEmail', request()->id], 'class'=>'m-form']) }}
                                          @include('customer.setup_customer_email_form') 
                                        {{ Form::close() }}
                                        <!--end::Form-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div> 
     </div>    
@endsection
                 