angular.module('crust').controller('RoleController', ['$rootScope', '$scope', '$filter', '$uibModal', 'setting', 'base', 'RoleFactory', 'PermissionFactory', function($rootScope, $scope, $filter, $uibModal, setting, base, RoleFactory, PermissionFactory) {

	setting.setup('role');

	$scope.addRole = function () {
		$uibModal.open({
			templateUrl: base.partial + 'modal/role.html',
			controller: 'ModalRoleCreate'
		}).result.then(function(role) {
			$scope.roles.data.push(role);
			$scope.roles.total++;
		});
	}

	$scope.editRole = function (role) {
		$uibModal.open({
			templateUrl: base.partial + 'modal/role.html',
			controller: 'ModalRoleEdit',
			resolve: {role: role},
		}).result.then(function(role) {
			var index   = findRole($scope.roles.data, role.id);
			if (index !== -1) $scope.roles.data[index] = role;
		});
	}

	$scope.deleteRole = function (role) {
		$uibModal.open({
			templateUrl: base.partial + 'modal/roledelete.html',
			controller: 'ModalRoleDelete',
			resolve: {role: role}
		}).result.then(function(role) {
			var index   = findRole($scope.roles.data, role.id);
			if (index !== -1) {
				$scope.roles.data.splice(index, 1);
				$scope.roles.total = $scope.roles.total - 1;
			}
		});
	}

	$scope.addPermission = function () {
		$uibModal.open({
			templateUrl: base.partial + 'modal/permission.html',
			controller: 'ModalPermissionCreate'
		}).result.then(function(permit) {
			$scope.permits.data.push(permit);
			$scope.permits.total++;
		});
	}

	$scope.editPermission = function (permit) {
		$uibModal.open({
			templateUrl: base.partial + 'modal/permission.html',
			controller: 'ModalPermissionEdit',
			resolve: {permit: permit},
		}).result.then(function(permit) {
			var index   = findRole($scope.permits.data, permit.id);
			if (index) $scope.permits.data[index] = permit;
		});
	}

	$scope.deletePermission = function (permit) {
		$uibModal.open({
			templateUrl: base.partial + 'modal/permissiondelete.html',
			controller: 'ModalPermissionDelete',
			resolve: {permit: permit}
		}).result.then(function(permit) {
			var index   = findRole($scope.permits.data, permit.id);
			if (index !== -1) {
				$scope.permits.data.splice(index, 1);
				$scope.permits.total = $scope.permits.total - 1;
			}
		});
	}

	$scope.roleData = function (page) {

		if(typeof page == 'undefined') page = '1';

		RoleFactory.role(page).then(function(data) {
			var data = data.data;
			$scope.roles = data;
		});
	}

	$scope.permitData = function (page) {

		if(typeof page == 'undefined') page = '1';

		PermissionFactory.permission(page).then(function(data) {
			var data = data.data;
			$scope.permits = data;
		});
	}

	function findRole(lists, id) {
		$roleSel = $filter('filter')(lists, {id: id}, true)[0];
			
		if ($roleSel) return lists.indexOf($roleSel);
		return -1;
	}

	$scope.roleData();
	$scope.permitData();

}]);