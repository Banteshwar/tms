@extends('layouts.backend')

@section('content')
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                       User Administration
                    </h3>
                </div>
            </div>
        </div>
        
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{ route('users.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-cart-plus"></i>
                                <span>
                                    New User
                                </span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
<!--begin: Datatable -->
            <table class="m-datatable" id="html_table" width="100%">
<thead>
<tr><th title="Name">Name</th>
<th title="Email">Email</th>
<th title="Date/Time Added">Date/Time Added</th>
<th title="User Roles">User Roles</th>
<th title="Operations">Operations</th>

</tr>
</thead>

<tbody>
@foreach ($users as $user)
<tr>

<td>{{ $user->name }}  </td>
<td>{{ $user->email }}</td>
<td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
<td>{{-- {{  $user->roles()->pluck('name')->implode(' ') }} --}} {{ $user->rolevalue }} </td>{{-- Retrieve array of roles associated to a user and convert to string --}}

<td>
<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'onsubmit' => 'return ConfirmDelete()']) !!}


{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

</td>
</tr>
                
            @endforeach       
                  
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>
</div>              
<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>

@endsection
