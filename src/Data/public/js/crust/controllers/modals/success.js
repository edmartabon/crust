angular.module('crust').controller('ModalSuccess', ['$rootScope', '$scope', '$uibModalInstance', function($rootScope, $scope, $uibModalInstance) {

	$scope.ok = function () {
		$uibModalInstance.close();
	}

}]);