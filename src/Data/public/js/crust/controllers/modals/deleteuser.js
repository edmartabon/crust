angular.module('crust').controller('ModalUserDelete', ['$rootScope', '$scope', '$uibModal', '$uibModalInstance', 'base', 'UserFactory', 'user', function($rootScope, $scope, $uibModal, $uibModalInstance, base, UserFactory, user) {

	$scope.ok = function () {
		submit(user);
	}

	$scope.cancel = function () {
		$uibModalInstance.dismiss('close');
	}

	function submit(user) {

		var waitingModal = waiting();

		UserFactory.deleteUser(user.id).then(function () {
			waitingModal.dismiss('close');
			$uibModalInstance.close(user);
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