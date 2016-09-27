<!DOCTYPE html>
<html lang="en" ng-app="cactus">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title> @yield('title') - Cactus User Management</title>

	    <!-- Bootstrap core CSS -->
	    <link href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/bootstrap.min.css" rel="stylesheet">

	    @yield('style')
  	</head>

	<body>
	    @yield('content')

	    @yield('script')
	</body>
</html>
