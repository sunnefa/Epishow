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

//functions to show episode data

$episode = new Episode($sql);
$episode_template = new EpisodeTemplate($episode->get_all_episodes());

function has_episodes() {
    global $episode_template;
    while($episode_template->has_episodes()) {
        return true;
    }
}

function episode_title() {
    global $episode_template;
    echo $episode_template->episode_title();
}

function episode_description() {
    global $episode_template;
    echo $episode_template->episode_description();
}

?>
