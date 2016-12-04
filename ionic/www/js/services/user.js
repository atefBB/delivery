angular
    .module('starter.services')
    .factory('User', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/authenticated', {}, {
            query: {
                isArray: true
            },
            authenticated: {
                method: 'GET',
                url: appConfig.baseUrl + '/api/authenticated'
            }
        });
    }]);