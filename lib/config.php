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

require_once('vendor/spyc/Spyc.php');

/**
 * Config class
 */
class PressbreakConfig {
  var $config = null;

  public function open($file) {
    $this->config = Spyc::YAMLLoad('config.yml');
    if(!$this->config) {
      return false;
    }

    return true;
  }

  public function getScanPaths() {
    if(!isset($this->config['scan_paths']))
      return null;

    return $this->config['scan_paths'];
  }
}
