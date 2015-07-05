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

require_once('lib/helpers.php');
Helper::initPage();
?>
<!doctype html>
<html lang="en" ng-app="pressbreakApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pressbreak</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/app.css" media="screen" charset="utf-8">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="vendor/angularjs/angular.min.js"></script>
  <script src="vendor/angularjs/angular-route.min.js"></script>
  <script src="vendor/angularjs/angular-resource.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/controllers.js"></script>
  <script src="js/services.js"></script>
<body>
  <div class="container">
    <div class="header clearfix">
      <nav ng-controller="NavController">
        <ul class="nav nav-pills pull-right">
          <li role="presentation" ng-class="getClass('/sites')"><a href="#/">Home</a></li>
          <li role="presentation" ng-class="getClass('/sites/scan')"><a href="#/sites/scan">Update Sites</a></li>
          <li role="presentation"><a href="signout.php">Sign Out</a></li>
        </ul>
      </nav>
      <h3 class="text-muted"><img src="img/hand-crush-cut-force-from-above-sml.gif" height="32"/>Pressbreak</h3>
    </div>

    <div ng-view></div>

    <footer class="footer">
      <p>
        Pressbreak | Available on <a href="https://github.com/pressbreak/pressbreak">Github</a> | Licensed <a href="https://www.gnu.org/licenses/gpl-2.0.html">GPLv2</a>
      </p>
    </footer>

  </div> <!-- /container -->

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="vendor/ie-viewport/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
