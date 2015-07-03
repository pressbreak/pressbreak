<?php
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
?>
<!doctype html>
<html lang="en" ng-app="signinApp">
<head>
  <meta charset="utf-8">
  <title>Pressbreak</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/signin.css">
</head>
<body>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.1/angular.min.js"></script>

  <script src="js/signin.js"></script>

  <div class="container" ng-controller="SigninController">
    <h1 class="text-center">Pressbreak</h1>
    <form class="form-signin">
        <div class="alert alert-danger" ng-init="msgLoginFailed=false" ng-show="msgLoginFailed" role="alert">
          {{msgLoginFailed_message}}
        </div>

        <h3 class="form-signin-heading">Sign in</h3>

        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" class="form-control" ng-model="user.username" placerholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" ng-model="user.password" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" ng-click="submit(user)" type="submit">Sign in</button>
    </form>
  </div>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
