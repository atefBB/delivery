angular
    .module('starter.controllers')
    .controller('ClientOrderCtrl',
        ['$scope', '$state', '$ionicLoading', 'Order',
            function ($scope, $state, $ionicLoading, Order) {

                $scope.items = [];

                $ionicLoading.show({
                    template: 'Carregando...'
                });

                $scope.doRefresh = function () {
                    getOrders().then(
                        function (data) {
                            $scope.items = data.data;
                            $scope.$broadcast('scroll.refreshComplete');
                        }, function (errorResponse) {
                            $scope.$broadcast('scroll.refreshComplete');
                        }
                    );
                };

                function getOrders() {
                    return Order.query({
                        id: null,
                        orderBy: 'created_at',
                        sortedBy: 'desc'
                    }).$promise;
                };

                getOrders().then(
                    function (data) {
                        $scope.items = data.data;
                        $ionicLoading.hide();
                    }, function (errorResponse) {
                        $ionicLoading.hide();
                    }
                );
            }
        ]
    );