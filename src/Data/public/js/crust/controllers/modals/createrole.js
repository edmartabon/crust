angular.module('crust').controller('ModalRoleCreate', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', '$q', 'base', 'RoleFactory', 'PermissionFactory', '$http', function($rootScope, $scope, $uibModal, $uibModalInstance, $q, base, RoleFactory, PermissionFactory, $http) {

	$scope.ok = function () {
		submit($scope.role);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(role) {

		var waitingModal = waiting();

		RoleFactory.storeRole(role).then(function (data) {
			waitingModal.dismiss('close');
			$uibModalInstance.close(data.data);
			success();
		})
		.catch(function(data){
            if (data.status == 422) $scope.errors = data.data;

            waitingModal.dismiss('close');
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
	
  	loadPermission();

}]);