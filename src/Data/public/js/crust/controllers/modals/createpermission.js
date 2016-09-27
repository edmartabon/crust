angular.module('crust').controller('ModalPermissionCreate', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', 'base', 'PermissionFactory', function($rootScope, $scope, $uibModal, $uibModalInstance, base, PermissionFactory) {

	$scope.ok = function () {
		submit($scope.permission);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(permission) {

		var waitingModal = waiting();

		PermissionFactory.storePermission(permission).then(function (data) {
			waitingModal.dismiss('close');
			$uibModalInstance.close(data.data);
			success();
		})
		.catch(function(data){
            if (data.status == 422) $scope.errors = data.data;

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