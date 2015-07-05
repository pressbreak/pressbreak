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

var pressbreakControllers = angular.module('pressbreakControllers', []);

pressbreakControllers.controller('SitesController', ['$scope', '$http',
  function($scope, $http) {
    // code
  }]);

pressbreakControllers.controller('NavController', ['$scope', '$location',
  function($scope, $location) {
    $scope.getClass = function(path) {
      if(path === '/sites') {
        if($location.path() === '/sites') {
          return "active";
        } else {
          return "";
        }
      }

      if ($location.path().substr(0, path.length) === path) {
        return "active";
      } else {
        return "";
      }
    }
  }]);
