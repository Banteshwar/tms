@extends('layouts.backend')

@section('content')
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
    <hr>
   
   <form method="POST" action="/users/{{$user->id}}" accept-charset="UTF-8">

    
        <input name="_method" value="PATCH" type="hidden">

         {{ csrf_field() }}

             <lable> Name : </lable> <input type="text" id="name" name="name" value="{{$user->name}}"> 
     <span class="text-danger">{{ $errors->first('name') }}</span>
      <br/>

      <lable> Age : </lable> <input type="text" id="email" name="email" value="{{$user->email}}"> 
       <span class="text-danger">{{ $errors->first('email') }}</span>
       <br/>

            <button type="submit" class="btn btn-primary">Submit</button>

     </form>

</div>
@endsection
