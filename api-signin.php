<?php
/*
Pressbreak - sign-in logic
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

  $destination_url = "app.php";

  require_once('vendor/spyc/Spyc.php');
  header('Content-Type: application/json');

  // make sure this is a POST request. If not redirect home.
  if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit(0);
  }

  // init session
  $sr = session_start();
  if(!$sr) {  // if session init failed for some reason
    $result_result = array(
      "success" => false,
      "errorMessage" => "Error creating session."
    );

    echo json_encode($return_result);
    exit(0);
  }

  // decode json post data
  $params = json_decode(file_get_contents('php://input'), true);

  // validate post data
  if(!isset($params['username']) || !isset($params['password'])) {
    // if either of the two aren't set, then return an error
    $return_result = array(
      "success" => false,
      "errorMessage" => "Username or password is missing."
    );

    echo json_encode($return_result);
    exit(0);
  }

  /* load user/config file */
  /* TODO: replace this with the Config class */
  $config = Spyc::YAMLLoad('config.yml');
  if(!$config) {
    $return_result = array(
      "success" => false,
      "errorMessage" => "Error opening config file."
    );
    echo json_encode($return_result);
    exit(0);
  }

  // check to see if we have a match for a user/pass combo
  $user_found = false;
  foreach($config['users'] as $user) {
    if($params['username'] == $user['username']&&
       $params['password'] == $user['password']) {
         // match found
         $user_found = true;
       }
  }

  // no user found, return error
  if(!$user_found) {
    unset($_SESSION['is_logged_in']);  // destroy logged in flag
    $return_result = array(
      "success" => FALSE,
      "errorMessage" => "Username or password is invalid."
    );

    echo json_encode($return_result);
    exit(0);
  }

  // set up session and return success
  $_SESSION['is_logged_in'] = true;

  $return_result = array(
    "success" => true,
    "redirectTo" => $destination_url
  );

  echo json_encode($return_result);
?>
