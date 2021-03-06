/*
Pressbreak
Copyright (C) 2015  Garrett Grice <ggrice@gmail.com>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

var pressbreakApp = angular.module('pressbreakApp', [
  'ngRoute',
  'pressbreakControllers',
  'pressbreakServices'
]);

pressbreakApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/sites', {
        templateUrl: 'partials/sites.html',
        controller: 'SitesController'
      }).
      when('/sites/scan', {
        templateUrl: 'partials/scan.html',
        controller: 'ScanController'
      }).
      when('/sites/:id/deploy', {
        templateUrl: 'partials/site-deploy.html',
        controller: 'DeployController'
      }).
      otherwise({
        redirectTo: '/sites'
      });
}]);


/* TODO: make this more Angular? I mean, this works fine, so..  *shrug* */
$(document).on('ready', function() {
  $('.back-to-top').on('click', function(event) {
    duration = 250;
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
  });
});
