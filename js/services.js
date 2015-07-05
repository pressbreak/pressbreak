var pressbreakServices = angular.module('pressbreakServices', ['ngResource']);

pressbreakServices.factory('SiteList', ['$resource',
  function($resource) {
    return $resource('api-sitelist.php', {}, {
      query: {
        method: 'GET',
        params: {},
        isArray: true
      }
    });
  }]);
