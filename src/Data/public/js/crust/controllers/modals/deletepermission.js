angular.module('crust').controller('ModalPermissionDelete', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', 'base', 'PermissionFactory', 'permit', function($rootScope, $scope, $uibModal, $uibModalInstance, base, PermissionFactory, permit) {

	$scope.ok = function () {
		submit(permit);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(permit) {

		var waitingModal = waiting();

		PermissionFactory.deletePermission(permit.id).then(function () {
			waitingModal.dismiss('close');
			$uibModalInstance.close(permit);
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