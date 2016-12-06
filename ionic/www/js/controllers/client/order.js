angular
    .module('starter.controllers')
    .controller('ClientOrderCtrl',
        ['$scope', '$state', '$ionicLoading', 'Order',
            function ($scope, $state, $ionicLoading, Order) {

                $scope.items = [];

                $ionicLoading.show({
                    template: 'Carregando...'
                });

                Order.query(
                    {
                        id: null,
                        orderBy: 'created_at',
                        sortedBy: 'desc'
                    },
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