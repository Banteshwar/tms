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
                                    Customer Basic Info
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {{ Form::open(['route' =>'customer.saveBasicInfo', 'class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) }}
                        @include('customer.basicinfo_form')
                    {{ Form::close() }}
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>

        </div> 
     </div>    
@endsection
                 