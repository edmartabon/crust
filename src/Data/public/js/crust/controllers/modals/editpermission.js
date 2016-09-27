angular.module('crust').controller('ModalPermissionEdit', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', 'base', 'PermissionFactory', 'permit', function($rootScope, $scope, $uibModal, $uibModalInstance, base, PermissionFactory, permit) {

	$scope.ok = function () {
		submit($scope.permission.id, $scope.permission);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(permitId, permit) {

		var waitingModal = waiting();

		PermissionFactory.updatePermission(permitId, permit).then(function (data) {
			waitingModal.dismiss('close');
			$uibModalInstance.close(data.data);
			success();
		})
		.catch(function(data){
            if (data.status == 422) $scope.errors = data.data;

            waitingModal.dismiss('close');
        });
	}

	function loadPermission(roleId) {
		PermissionFactory.showPermission(roleId).then(function (data) {
			$scope.permission = data.data;
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

	loadPermission(permit.id);

}]);