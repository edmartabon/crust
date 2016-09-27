angular.module('crust').controller('ModalRoleEdit', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', '$q', 'base', 'RoleFactory', 'PermissionFactory', 'role', function($rootScope, $scope, $uibModal, $uibModalInstance, $q, base, RoleFactory, PermissionFactory, role) {

	$scope.ok = function () {
		submit($scope.role.id, $scope.role);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(roleId, role) {

		var waitingModal = waiting();

		RoleFactory.updateRole(roleId, role).then(function (data) {
			waitingModal.dismiss('close');
			$uibModalInstance.close(data.data);
			success();
		})
		.catch(function(data){
            if (data.status == 422) $scope.errors = data.data;

            waitingModal.dismiss('close');
        });
	}

	function loadRole(roleId) {
		RoleFactory.showRole(roleId).then(function (data) {
			$scope.role = data.data;
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

	loadRole(role.id);

	loadPermission();

}]);