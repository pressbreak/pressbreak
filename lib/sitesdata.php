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

  abstract public function open($settings);

  public function toJSON() {
    if($data == NULL) {
      return json_encode(array());
    } 
    return json_encode($data);
  }
}

/**
 * Get site data from the file
 */
class SiteFile extends SiteDataClass {

  public function open($settings)
  {
    $raw = file_get_contents($settings['file']);
    if($raw === FALSE) {
      return FALSE;
    }

    $result = json_decde($raw);
    if($result == NULL) {
      return FALSE;
    }

    $this->data = $result;
    return TRUE;
  }

}


 ?>
