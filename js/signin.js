/*
Pressbreak - sign-in logic, client side
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

var signinApp = angular.module('signinApp', []);

signinApp.controller('SigninController', ['$scope', '$http', function($scope, $http) {
  $scope.msgLoginFailed = false;
  $scope.msgLoginFailed_message = "";

  $scope.submit = function(user) {
    $http({
      method:   'POST',
      url:      'api-signin.php',
      data:     {username: user.username, password: user.password},
      headers:  {'Content-Type': 'application/x-www-form-urlencoded'}
    }).
      success(function(data, status, headers, config) {
        if(data['success'] == false) {
          // username/password not valid
          $scope.msgLoginFailed = true;
          $scope.msgLoginFailed_message = data['errorMessage'];
        } else {
          // redirect to inside page now that session is set up
          $scope.msgLoginFailed = false;
          // alert("Login successful!");
          // window.location.href = data['redirectTo'];
          location.assign(data['redirectTo']);
        }
      }).
      error(function(data, status, headers, config) {
        $scope.msgLoginFailed = true;
        $scope.msgLoginFailed_message = "An unknown error occured.";
      });
  }
}]);
