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

pressbreakServices.factory('ScanInstallations', ['$resource',
  function($resource) {
    return $resource('api-scanpaths.php', {}, {
      query: {
        method: 'GET',
        params: {},
        isArray: false
      }
    });
  }]);
