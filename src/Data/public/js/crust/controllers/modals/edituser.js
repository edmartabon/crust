angular.module('crust').controller('ModalUserEdit', ['$rootScope', '$scope', '$uibModal', '$q', '$uibModalInstance', 'base', 'UserFactory', 'RoleFactory', 'PermissionFactory', 'user', function($rootScope, $scope, $uibModal, $q, $uibModalInstance, base, UserFactory, RoleFactory, PermissionFactory, user) {

	$scope.ok = function () {
		submit($scope.user.id, $scope.user);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	$scope.roleName = function (data) {
		if (typeof data.role_name == 'undefined') console.log(data);
		console.log(data.role_name);
	}

	function submit(userId, user) {

		var waitingModal = waiting();

		UserFactory.updateUser(userId, user).then(function (data) {
			waitingModal.dismiss('close');
			$uibModalInstance.close(data.data);
			success();
		})
		.catch(function(data){
            if (data.status == 422) $scope.errors = data.data;

            waitingModal.dismiss('close');
        });
	}

	function loadUser(userId) {
		UserFactory.showUser(userId).then(function (data) {
			$scope.user = angular.extend(data.data, data.data.user_information);
		});
	}

	function loadRole() {
		RoleFactory.createRole().then(function(data) {
			$scope.roles = data.data;
		});
	}

	function loadPermission() {
		PermissionFactory.createPermission().then(function(data) {
			$scope.permissions = data.data;
		});
	}

	function waiting() {
		return $uibModal.open({
			templateUrl: base.partial + 'modal/waiting.html',
			backdrop: 'static'
		});
	}

	function success() {
		return $uibModal.open({
			templateUrl: base.partial + 'modal/success.html',
			controller: 'ModalSuccess'
		});
	}
	
	loadUser(user.id);
	loadRole();
	loadPermission();

}]);