// Ionic Starter App
angular.module('starter.controllers', []);
angular.module('starter.services', []);

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', [
    'ionic', 'ionic.service.core',
    'starter.controllers',
    'starter.services',
    'angular-oauth2',
    'ngResource'
])
    .constant('appConfig', {
        baseUrl: 'http://code-delivery.herokuapp.com'
    })
    .run(function ($ionicPlatform) {
        $ionicPlatform.ready(function () {
            if (window.cordova && window.cordova.plugins.Keyboard) {
                // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
                // for form inputs)
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

                // Don't remove this line unless you know what you are doing. It stops the viewport
                // from snapping when text inputs are focused. Ionic handles this internally for
                // a much nicer keyboard experience.
                cordova.plugins.Keyboard.disableScroll(true);
            }
            if (window.StatusBar) {
                StatusBar.styleDefault();
            }

            Ionic.io();
            var push = new Ionic.Push({
                debug: true,
                onNotification: function (message) {
                    alert(message.text);
                }
            });
            push.register(function (token) {
                console.log(token);
            });
        });
    })
    .config(['$stateProvider', '$urlRouterProvider', 'OAuthProvider', 'OAuthTokenProvider', 'appConfig', '$provide',
        function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig, $provide) {

            OAuthProvider.configure({
                baseUrl: appConfig.baseUrl,
                clientId: 'app',
                clientSecret: 'secret',
                grantPath: '/oauth/access_token'
            });

            OAuthTokenProvider.configure({
                name: 'token',
                options: {
                    secure: false
                }
            });

            $stateProvider
                .state('login', {
                    url: "/login",
                    templateUrl: "templates/login.html",
                    controller: 'LoginCtrl'
                })
                .state('home', {
                    url: "/home",
                    templateUrl: "templates/home.html",
                    controller: function () {
                    }
                })
                .state('client', {
                    abstract: true,
                    url: "/client",
                    template: "<ion-nav-view/>"
                })
                .state('client.checkout', {
                    cache: false,
                    url: "/checkout",
                    templateUrl: "templates/client/checkout.html",
                    controller: 'ClientCheckoutCtrl'
                })
                .state('client.checkout_item_detail', {
                    url: "/checkout/detail/:index",
                    templateUrl: "templates/client/checkout_item_detail.html",
                    controller: 'ClientCheckoutDetailCtrl'
                })
                .state('client.checkout_successful', {
                    cache: false,
                    url: "/checkout/successful",
                    templateUrl: "templates/client/checkout_successful.html",
                    controller: 'ClientCheckoutSuccessfulCtrl'
                })
                .state('client.view_products', {
                    url: "/view_products",
                    templateUrl: "templates/client/view_products.html",
                    controller: 'ClientViewCheckoutCtrl'
                });
            $urlRouterProvider.otherwise('/login');

            $provide.decorator('OAuthToken', ['$localStorage', '$delegate', function ($localStorage, $delegate) {
                Object.defineProperties($delegate, {
                    setToken: {
                        value: function (data) {
                            return $localStorage.setObject('token', data);
                        },
                        enumerable: true,
                        configurable: true,
                        writable: true
                    }, getToken: {
                        value: function () {
                            return $localStorage.getObject('token');
                        },
                        enumerable: true,
                        configurable: true,
                        writable: true
                    }, removeToken: {
                        value: function () {
                            return $localStorage.setObject('token', null);
                        },
                        enumerable: true,
                        configurable: true,
                        writable: true
                    }
                });
                return $delegate;
            }]);
        }])
    .service('cart', function () {
        this.items = [];
    });