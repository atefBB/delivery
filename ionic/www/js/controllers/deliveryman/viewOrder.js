angular
    .module('starter.controllers')
    .controller('DeliverymanViewOrderCtrl',
        ['$scope', '$stateParams', 'DeliverymanOrder', '$ionicLoading',
            function ($scope, $stateParams, DeliverymanOrder, $ionicLoading) {

                $scope.order = {};

                $ionicLoading.show({
                    template: 'Carregando...'
                });

                DeliverymanOrder.get({id: $stateParams.id, include: 'items,cupom'}, function (data) {
                    $scope.order = data.data;
                    $ionicLoading.hide();
                }, function (errorResponse) {
                    $ionicLoading.hide();
                });

                DeliverymanOrder.updateStatus({id: $stateParams.id}, {status: 1}, function (dataSuccess) {
                    console.log(dataSuccess);
                });

                DeliverymanOrder.geo({id: $stateParams.id}, {lat: -23.444, long: -45.444}, function (dataSuccess) {
                    console.log(dataSuccess);
                });

            }]);