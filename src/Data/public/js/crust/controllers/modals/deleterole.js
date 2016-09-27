angular.module('crust').controller('ModalRoleDelete', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', 'base', 'RoleFactory', 'role', function($rootScope, $scope, $uibModal, $uibModalInstance, base, RoleFactory, role) {

	$scope.ok = function () {
		submit(role);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(role) {

		var waitingModal = waiting();

		RoleFactory.deleteRole(role.id).then(function () {
			waitingModal.dismiss('close');
			$uibModalInstance.close(role);
			success();
		})
		.catch(function(data) {
            waitingModal.dismiss('close');
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

}]);