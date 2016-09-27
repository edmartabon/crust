angular.module('crust').factory('setting', ['$rootScope', function($rootScope) {
	var 
		appTitle   = 'Crust User and Role Management',
		setting    = {};

	config = {
		dashboard: {
			appTitle: "Dashboard - " + appTitle,
			pageTitle: "Dashboard"
		},
		role: {
			appTitle: "Role - " + appTitle,
			pageTitle: "Role"
		}
	};

	setting.setup = function (value) {

		var parent			 = config[value];
		$rootScope.appTitle  = parent.appTitle;
		$rootScope.title     = parent.pageTitle;
		
	}

	return setting;

}]);