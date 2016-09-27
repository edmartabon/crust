@extends('crust::layouts.login')

@section('title')
Login
@endsection

@section('style')
	<!-- Custom styles for this template -->
    	<link href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/crust/login.css" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper">
	    <form class="form-signin" action="{{ url('/') }}/crust/authenticate" method="POST">       
	      	<h2 class="form-signin-heading">Please login</h2>
	      	@if($errors->any())
			<div class="alert alert-danger" role="alert">
			  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  	<span class="sr-only">Error:</span>
			  	{{$errors->first()}}
			</div>
			@endif
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	      	<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
	      	<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
	      	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
	    </form>
  	</div>
@endsection