<!DOCTYPE html>
<html lang="en" ng-app="crust">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>@{{ appTitle }}</title>

	    <!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/bootstrap.min.css">
	    <link rel="stylesheet" href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/font-awesome.min.css">
	    <link rel="stylesheet" href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/multiselect.min.css">
	    <link rel="stylesheet" href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/crust/style.css">
	    <link rel="stylesheet" href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/select.min.css">
	    <link rel="stylesheet" href="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/css/select2.min.css">

  	</head>

	<body>
	    @yield('content')
	    <script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/jquery.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/angular.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/select.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/ui-bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/angular-sanitize.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/angular-ui-router.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/angular-modal-service.min.js"></script>

		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/app.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/route.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/setting.js"></script>

		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/dashboard.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/role.js"></script>

		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/factory/user.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/factory/role.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/factory/permission.js"></script>

		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/createuser.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/edituser.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/deleteuser.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/createrole.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/editrole.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/deleterole.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/createpermission.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/editpermission.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/deletepermission.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/controllers/modals/success.js"></script>

		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/directives/pagination.js"></script>

		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/filters/props-filter.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/vendor/edmartabon/crust/src/Data/public/js/crust/filters/props-filter.js"></script>

	</body>
</html>
