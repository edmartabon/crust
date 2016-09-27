@extends('crust::layouts.crust')

@section('content')
	<nav class="navbar navbar-default box-shadow navbar-fixed-top">
	  	<div class="container-fluid">
	  		<div class="navbar-header"><a href="#" class="navbar-brand">@{{ title }}</a> </div>
	  		<p class="navbar-text navbar-right sign-in-user">
	  			<a href="{{ url('logout') }}" class="navbar-link">Logout</a>
  			</p>
	  		<p class="navbar-text navbar-right sign-in-user">Welcome 
		  		{{ ucfirst(Human::get(Human::currentHuman()->id)['first_name']) }} 
		  		{{ ucfirst(Human::get(Human::currentHuman()->id)['last_name']) }}!
  			</p>
	  	</div>
	</nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar">
            <ul class="sidebar-nav">
            	<li class="sidebar-logo">
                    <a href="#">Crust</a>
                </li>
                <li><a ui-sref="dashboard">Dashboard</a></li>
                <li><a ui-sref="role">User Role</a></li>
            </ul>
        </div>
        <!-- /#sidebar -->

        <!-- Page Content -->
        <div id="wrapper-content">
            <div class="container-fluid">
                <div ui-view></div>
            </div>
        </div>
        <!-- /#wrapper-content -->

    </div>
@endsection