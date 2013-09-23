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

ob_start();

define('EPISODEY', true);

//include the init.php which includes all other neccesary files
if(!require_once("config/init.php")) {
    die("The init.php file could not be included, please contact the system administrator.");
}

$sql = new MySQLWrapper('episodey', 'episodey', 'episodey', 'localhost');

//$settings = new Settings($sql);

include 'ep_episodes.php';
?>

<?php while(has_episodes()): ?>
    <p><?php episode_title(); ?></p>
    <p><?php episode_description(); ?></p>
<?php endwhile; ?>
<?php
ob_end_flush();
?>
