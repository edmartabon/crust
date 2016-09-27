angular.module('crust').controller('ModalUserCreate', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', 'base', 'UserFactory', 'RoleFactory', 'PermissionFactory', function($rootScope, $scope, $uibModal, $uibModalInstance, base, UserFactory, RoleFactory, PermissionFactory) {

	$scope.ok = function () {
		submit($scope.user);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(user) {

		var waitingModal = waiting();

		UserFactory.storeUser(user).then(function (data) {
			waitingModal.dismiss('close');
			$uibModalInstance.close(data.data);
			success();
		})
		.catch(function(data){
            if (data.status == 422) $scope.errors = data.data;

            waitingModal.dismiss('close');
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

	loadRole();
	loadPermission();

}]);