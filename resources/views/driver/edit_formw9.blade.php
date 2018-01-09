@extends('layouts.backend')
    @section('content')
        @php                            
            $driver_id = \Session::get('driver_edit_id') ?? '';
        @endphp
        @include('driver.top_menu')

        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="top-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Driver Formw9
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
                    {{ Form::model($driverFormNine, ['route'=>['driver.updateFormw9', request()->id]]) }}
                        @php
                            if($driver_id):
                                echo '<input name="driver_id" type="hidden" value="'. $driver_id .'"/>';
                            endif;                        
                        @endphp

                       @include('driver.formw9_form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
@endsection