angular.module('crust').factory('UserFactory', ['$http', 'base', function($http, base) {

	var factory = {};

	factory.user = function (number) {
		return $http.get(base.API + 'users', {
		    params: { page: number }
		});
	}

	factory.createUser = function (user) {
		return $http.get(base.API + 'users/create');
	}

	factory.storeUser = function (user) {
		return $http.post(base.API + 'users', user);
	}

	factory.showUser = function (userId) {
		return $http.get(base.API + 'users' + '/' + userId);
	}

	factory.updateUser = function (userId, data) {
		return $http.put(base.API + 'users' + '/' + userId, data);
	}

	factory.deleteUser = function (userId) {
		return $http.delete(base.API + 'users' + '/' + userId);
	}

	return factory;

}]);