angular.module('starter.filters')
    .filter('join', function () {
        return function (input, separator) {
            return input.join(separator);
        };
    });