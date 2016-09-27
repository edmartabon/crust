angular.module('crust').directive('cactusPagination', ['$rootScope', function($rootScope) {  
   return{
      restrict: 'E',
      transclude: true,
      scope: {
        pageItem: '=pageItem'
      },
      template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="paginationNode(1)">&laquo;</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="paginationNode(currentPage-1)">&lsaquo; Prev</a></li>'+

        '<li ng-show="currentPage == totalPages && totalPages > 1 && currentPage - 6 >= 0"><a href="javascript:void(0)" ng-click="paginationNode(currentPage - 6)">{{ currentPage - 6}}</a></li>' +
        '<li ng-show="currentPage + 1 >= totalPages && totalPages > 2 && currentPage - 5 >= 0"><a href="javascript:void(0)" ng-click="paginationNode(currentPage - 5)">{{ currentPage - 5}}</a></li>' +
        '<li ng-show="currentPage + 2 >= totalPages && totalPages > 3 && currentPage - 4 >= 0"><a href="javascript:void(0)" ng-click="paginationNode(currentPage - 4)">{{ currentPage - 4}}</a></li>' +

        '<li ng-show="currentPage - 3 >= 1"><a href="javascript:void(0)" ng-click="paginationNode(currentPage - 3)">{{ currentPage - 3}}</a></li>' +
        '<li ng-show="currentPage - 2 >= 1"><a href="javascript:void(0)" ng-click="paginationNode(currentPage - 2)">{{ currentPage - 2}}</a></li>' +
        '<li ng-show="currentPage - 1 >= 1"><a href="javascript:void(0)" ng-click="paginationNode(currentPage - 1)">{{ currentPage - 1}}</a></li>' +
        '<li class="active"><a href="javascript:void(0)">{{ currentPage }}</a></li>' + 
        '<li ng-show="currentPage + 1 <= totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage + 1)">{{ currentPage + 1}}</a></li>' +
        '<li ng-show="currentPage + 2 <= totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage + 2)">{{ currentPage + 2}}</a></li>' +
        '<li ng-show="currentPage + 3 <= totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage + 3)">{{ currentPage + 3}}</a></li>' +

        '<li ng-show="currentPage - 3 <= 0 && currentPage < totalPages && currentPage + 4 <= totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage + 4)">{{ currentPage + 4}}</a></li>' +
        '<li ng-show="currentPage - 2 <= 0 && currentPage < totalPages && currentPage + 5 <= totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage + 5)">{{ currentPage + 5}}</a></li>' +
        '<li ng-show="currentPage == 1 && currentPage < totalPages && currentPage + 6 <= totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage + 6)">{{ currentPage + 6}}</a></li>' +

        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="paginationNode(currentPage+1)">Next &rsaquo;</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="paginationNode(totalPages)">&raquo;</a></li>'+
      '</ul>',
    link: function ($scope, element, attrs) {
      $scope.currentPage = 1;
      $scope.$watch('pageItem', function(pageItem) {
        $scope.per_page    = typeof pageItem == 'undefined'  ? 1 : pageItem.per_page;
        $scope.totalPages  = typeof pageItem == 'undefined'  ? 1 : pageItem.total;
        $scope.totalPages  = Math.ceil($scope.totalPages / $scope.per_page);

        if ($scope.currentPage > $scope.totalPages) {
          $scope.currentPage = $scope.currentPage - 1;
          $scope.paginationNode($scope.currentPage);
        }
      }, true);

      $scope.paginationNode = function (page) {
        $scope.$parent[attrs.factory](page);
        $scope.currentPage = page;
      }
    }
   };
}]);