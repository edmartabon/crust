angular.module('crust')
.config(['$urlRouterProvider', '$stateProvider', 'base', function ($urlRouterProvider, $stateProvider, base) {

	$urlRouterProvider.otherwise('/');

	$stateProvider
	.state('dashboard', {
		url: '/',
		templateUrl: base.partial + 'dashboard.html',
		controller: 'DashboardController'
	})
	.state('role', {
		url: '/role',
		templateUrl: base.partial + 'role.html',
		controller: 'RoleController'
	})
}]);
