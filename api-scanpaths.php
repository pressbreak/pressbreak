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
// error_reporting(0);

require_once('lib/helpers.php');
Helper::initPage();

function scanPathForWordpress($path) {
    $directory = new RecursiveDirectoryIterator(realpath($path));
    $iterator = new RecursiveIteratorIterator($directory);
    $regex = new RegexIterator($iterator, '/wp-config\.php$/i', RecursiveRegexIterator::GET_MATCH);

    return iterator_to_array($regex);
}


sleep(1);
require_once('lib/config.php');
header('Content-Type: application/json');

$config = new PressbreakConfig();
$config->open('config.yml');

$scanPaths = $config->getScanPaths();

$returnResult = array();
$returnResult['paths'] = $scanPaths;
$returnResult['hasErrors'] = false;
$returnResult['errors'] = array();

$scanArray = array();
foreach ($scanPaths as $path) {
  $scanArray[$path] = array();
  try {
    $rr = scanPathForWordpress($path);
    if($rr)
      $scanArray[$path] = $rr;
    else {
      $scanArray[$path] = array();
    }

  } catch (Exception $e) {
    $scanArray[$path] = array();
    $returnResult['hasErrors'] = true;
    $returnResult['errors'][] = $e->getMessage();
  }
  // $scanArray[$path] = iterator_to_array(scanPathForWordpress($path));
}

$returnResult['installationsFound'] = $scanArray;

echo json_encode($returnResult);
exit(0);

?>
