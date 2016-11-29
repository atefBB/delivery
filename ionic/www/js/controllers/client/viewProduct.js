angular
    .module('starter.controllers')
    .controller('ClientViewCheckoutCtrl',
        ['$scope', '$state', 'Product', '$ionicLoading', '$cart',
        function ($scope, $state, Product, $ionicLoading, $cart) {

            $scope.products = [];

            $ionicLoading.show({
                template: 'Carregando...'
            });

            Product.query({}, function (data) {
                $scope.products = data;
                $ionicLoading.hide();
            }, function (errorResponse) {
                $ionicLoading.hide();
            });

            $scope.addItem = function (item) {
                item.qtd = 1;
                $cart.addItem(item);
                $state.go('client.checkout')
            };

        }]);