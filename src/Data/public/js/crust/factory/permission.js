angular.module('crust').factory('PermissionFactory', ['$http', 'base', function($http, base) {

	var factory = {};

	factory.permission = function (number) {
		return $http.get(base.API + 'permissions', {
		    params: { page: number }
		});
	}

	factory.createPermission = function () {
		return $http.get(base.API + 'permissions/create');
	}

	factory.storePermission = function (permission) {
		return $http.post(base.API + 'permissions', permission);
	}

	factory.showPermission = function (permissionId) {
		return $http.get(base.API + 'permissions' + '/' + permissionId);
	}

	factory.updatePermission = function (permissionId, data) {
		return $http.put(base.API + 'permissions' + '/' + permissionId, data);
	}

	factory.deletePermission = function (permissionId) {
		return $http.delete(base.API + 'permissions' + '/' + permissionId);
	}

	return factory;

}]);