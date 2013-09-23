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
 * Represents a single episode in the database
 *
 * @author Sunnefa Lind <sunnefa_lind@hotmail.com>
 */
class Episode extends Model {
    
    /**
     * The id of the episode
     * @var int 
     */
    protected $episode_id;
    
    /**
     * The title of the episode
     * @var string 
     */
    protected $episode_title;
    
    /**
     * The season the episode belongs to
     * @var int 
     */
    protected $episode_season;
    
    /**
     * A description of the episode
     * @var stirng 
     */
    protected $episode_description;
    
    /**
     * A thumbnail with the episode
     * @var string 
     */
    protected $episode_thumbnail;
    
    /**
     * The episode airdate
     * @var string 
     */
    protected $episode_airdate;
    
    protected $episodes;
    
    protected $i = -1;
    
    /**
     * Constructor
     * @param DBWrapper $db_wrapper
     * @param int $episode_id 
     */
    public function __construct(DBWrapper $db_wrapper, $episode_id = 0) {
        $this->db_wrapper = $db_wrapper;
        
        //we must remember to change this because the user should be able to set the db prefix
        $this->table_name = 'episodey__episodes';
        
        if($episode_id) {
            $this->get_episode_by_id($episode_id);
        }
    }
    
    /**
     * Select a single episode from the database and bind the data to this object
     * @param int $id
     * @return boolean 
     */
    private function get_episode_by_id($id) {
        $episode = $this->db_wrapper->select_data($this->table_name, '*', 'episode_id = ' . $id);
        if($episode) {
            $episode = Functions::array_flat($episode);
            
            $this->episode_airdate = $episode['episode_airdate'];
            $this->episode_title = $episode['episode_title'];
            $this->episode_id = $episode['episode_id'];
            $this->episode_season = $episode['episode_season'];
            $this->episode_description = $episode['episode_description'];
            $this->episode_thumbnail = $episode['episode_thumbnail'];
            
        }
        else {
            return false;
        }
    }
    
    /**
     * Get a list of all episodes in the database
     * @return boolean 
     */
    public function get_all_episodes() {
        $episodes = $this->db_wrapper->select_data($this->table_name, '*');
        if($episodes) {
            return $episodes;
        } else {
            return false;
        }
    }
    
    /**
     * Get a list of all the episodes in a single season
     * @param int $season_id
     * @return boolean 
     */
    public function get_episodes_by_season_id($season_id) {
        $episodes = $this->db_wrapper->select_data($this->table_name, '*', 'episode_season = ' . $season_id);
        if($episodes) {
            return $episodes;
        } else {
            return false;
        }
    }
    
    /**
     * Add a new episode to the database
     * @param array $episode_data 
     * @return boolean
     */
    public function add_episode($episode_data) {
        $success = $this->db_wrapper->insert_data($this->table_name, array(
            'episode_title' => $episode_data['title'],
            'episode_airdate' => $episode_data['airdate'],
            'episode_thumbnail' => $episode_data['thumbnail'],
            'episode_description' => $episode_data['description'],
            'episode_season' => $episode_data['season']
        ));
        if($success) return true;
        else return false;
    }
    
    /**
     * Delete a single episode by id
     * @param int $episode_id 
     * @return boolean
     */
    public function delete_single_episode($episode_id) {
        $success = $this->db_wrapper->delete_data($this->table_name, 'episode_id = ' . $episode_id);
        if($success) return true;
        else return false;
    }
    
    /**
     * Delete all the episodes in a season
     * @param int $season_id 
     * @return boolean
     */
    public function delete_episodes_in_season($season_id) {
        $success = $this->db_wrapper->delete_data($this->table_name, 'episode_season = ' . $season_id);
        if($success) return true;
        else return false;
    }
    
    /**
     * Update an episode
     * @param array $episode_data
     * @return boolean 
     */
    public function update_episode($episode_data) {
        $success = $this->db_wrapper->update_data($this->table_name, array(
            'episode_title' => $episode_data['title'],
            'episode_airdate' => $episode_data['airdate'],
            'episode_thumbnail' => $episode_data['thumbnail'],
            'episode_description' => $episode_data['description'],
            'episode_season' => $episode_data['season']
        ), 'episode_id = ' . $episode_data['id']);
       if($success) return true;
        else return false;
    }
}

?>
