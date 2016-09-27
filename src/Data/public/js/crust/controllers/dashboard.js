angular.module('crust').controller('DashboardController', ['$rootScope', '$scope', '$filter', '$uibModal', 'setting', 'base', 'UserFactory', function($rootScope, $scope, $filter, $uibModal, setting, base, UserFactory) {

	setting.setup('dashboard');

	$scope.addUser = function () {
		$uibModal.open({
			templateUrl: base.partial + 'modal/userinfo.html',
			controller: 'ModalUserCreate',
			size: 'lg'
		}).result.then(function(users) {
			$scope.users.data.push(users);
			$scope.users.total++;
		});
	}

	$scope.editUser = function (user) {
		$uibModal.open({
			templateUrl: base.partial + 'modal/userinfo.html',
			controller: 'ModalUserEdit',
			resolve: {user: user},
			size: 'lg'
		}).result.then(function(user) {
			var index = findUser($scope.users.data, user.id);
			if (index !== -1) $scope.users.data[index] = user;
		});
	}

	$scope.deleteUser = function (user) {
		$uibModal.open({
			templateUrl: base.partial + 'modal/userdelete.html',
			controller: 'ModalUserDelete',
			resolve: {user: user}
		}).result.then(function(user) {
			var index = findUser($scope.users.data, user.id);
			if (index !== -1) {
				$scope.users.data.splice(index, 1);
				$scope.users.total = $scope.users.total - 1;
			}
		});
	}

	$scope.userData = function user(page) {
		if(typeof page == 'undefined') page = '1';

		UserFactory.user(page).then(function(data) {
			var data = data.data;
			$scope.users = data;
		});
	}

	function findUser(lists, id) {
		$userSel = $filter('filter')(lists, {id: id}, true)[0];
			
		if ($userSel) return lists.indexOf($userSel);
		return -1;
	}

	$scope.userData();

}]);