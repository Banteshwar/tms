@if (\Session::has('success'))    
  	<div class="alert alert-success">
    	<p>{{ \Session::get('success') }}</p>
  	</div>	
@endif	


@if (\Session::has('error'))    
  	<div class="alert alert-danger">
    	<p>{{ \Session::get('error') }}</p>
  	</div>	
@endif	

                          
@if(Session::has('flash_message'))
	<div class="alert alert-success" role="alert">
		{!! session('flash_message') !!}
	</div>
@endif  