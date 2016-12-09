angular.module('starter.controllers')
    .controller('LoginCtrl',
        ['$scope', 'OAuth', 'OAuthToken', '$ionicPopup', '$state', 'UserData', 'User',
            function ($scope, OAuth, OAuthToken, $ionicPopup, $state, UserData, User) {

                $scope.user = {
                    username: '',
                    password: ''
                };

                $scope.login = function () {

                    var promise = OAuth.getAccessToken($scope.user);

                    promise
                        .then(function (data) {
                            return User.authenticated({include: 'client'}).$promise;
                        })
                        .then(function (dataSuccess) {
                            UserData.set(dataSuccess.data);
                            $state.go('client.checkout');
                        }, function (errorResponse) {
                            UserData.set(null)
                            OAuthToken.removeToken();
                            $ionicPopup.alert({
                                title: 'Aviso',
                                template: 'Login e/ou senha inválidos!'
                            });
                        });
                };
            }]);