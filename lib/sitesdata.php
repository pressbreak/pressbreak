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


/**
 * Site Data
 */
abstract class SiteDataClass {
  var $data = NULL;
  var $sites = array();

  abstract public function open();
  // abstract function hasSite($path);
  abstract public function getSite($path);

  public function toJSON() {
    if($data == NULL) {
      return json_encode(array());
    }
    return json_encode($data);
  }
}

/**
 * Site
 */
class Site
{
  public $path, $friendlyName, $isConfigured;

  function __construct($dataArray)
  {
    $this->path          = $dataArray['path'];
    $this->friendlyName  = $dataArray['friendlyName'];
    $this->isConfigured  = $dataArray['isConfigured'];
  }
}


/**
 * Get site data from the file
 */
class SiteFile extends SiteDataClass {
  var $file;

  public function __construct($file) {
    // parent::__construct();
    $this->file = $file;
  }

  public function open()
  {
    try {
      if(!file_exists($this->file))
        throw new Exception("Error: File doesn't exist", 1);

      $raw = file_get_contents($this->file);
      if($raw === FALSE) {
        return FALSE;
      }

      $result = json_decde($raw);
      if($result == NULL) {
        return FALSE;
      }

      $this->data = $result;
      return TRUE;
    } catch (Exception $e) {
      return FALSE;
    }
  }

  function getSite($path) {
    foreach ($this->sites as $site) {
      if($site->path == $path) {
        /* match site, return it */
        return $site;
      }
    }

    /* we have reached here, that means we didn't find a match */
    return null;
  }

}


 ?>
