angular.module('crust').factory('RoleFactory', ['$http', 'base', function($http, base) {

	var factory = {};

	factory.role = function (number) {
		return $http.get(base.API + 'roles', {
		    params: { page: number }
		});
	}

	factory.createRole = function (role) {
		return $http.get(base.API + 'roles/create');
	}

	factory.storeRole = function (role) {
		return $http.post(base.API + 'roles', role);
	}

	factory.showRole = function (roleId) {
		return $http.get(base.API + 'roles' + '/' + roleId);
	}

	factory.updateRole = function (roleId, data) {
		return $http.put(base.API + 'roles' + '/' + roleId, data);
	}

	factory.deleteRole = function (roleId) {
		return $http.delete(base.API + 'roles' + '/' + roleId);
	}

	return factory;

}]);