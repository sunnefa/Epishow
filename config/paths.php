<?php

/* * *********************
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  @author Sunnefa Lind <sunnefa_lind@hotmail.com>
 * ********************* */
//defines paths as constants

if(!defined('EPISODEY')) {
    die('No direct execution of this file');
}

/**
 * A shortcut to the directory separator 
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * The root directory 
 */
define('ROOT', dirname(dirname(__FILE__)) . DS);

/**
 * The classes directory 
 */
define('CLASSES', ROOT . 'classes' . DS);
?>
