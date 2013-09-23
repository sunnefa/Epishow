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

/**
 * Description of EpisodeTemplate
 *
 * @author Sunnefa Lind <sunnefa_lind@hotmail.com>
 */
class EpisodeTemplate {
    private $i = -1;
    private $episodes;
    private $episode;
    
    public function __construct($episodes){
        $this->episodes = $episodes;
    }
    
    private function next_episode() {
        $this->i++;
        $this->episode = $this->episodes[$this->i];
        return $this->episode;
    }
    
    public function has_episodes() {
        if($this->i + 1 < count($this->episodes)) {
            $this->next_episode();
            return true;
        }
    }
    
    public function episode_title() {
        return $this->episode['episode_title'];
    }
    
    public function episode_description() {
        return $this->episode['episode_description'];
    }
}

?>
