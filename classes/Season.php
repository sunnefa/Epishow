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
 * A single season
 *
 * @author Sunnefa Lind <sunnefa_lind@hotmail.com>
 */
class Season extends Model {
    
    /**
     * The id of the season
     * @var int 
     */
    protected $season_id;
    
    /**
     * The title of the season
     * @var string 
     */
    protected $season_title;
    
    /**
     * The id of the show this season is in
     * @var int 
     */
    protected $show_id;
    
    /**
     * The season number in the show
     * @var int 
     */
    protected $season_number;
    
    /**
     * Constructor
     * @param DBWrapper $db_wrapper
     * @param int $season_id 
     */
    public function __construct(DBWrapper $db_wrapper, $season_id = 0) {
        $this->db_wrapper = $db_wrapper;
        
        $this->table_name = 'episodey__seasons';
        
        if($season_id) {
            $this->select_season($season_id);
        }
    }
    
    /**
     * Selects a single season and binds the data to this object
     * @param int $season_id
     * @return boolean 
     */
    private function select_season($season_id) {
        $season = $this->db_wrapper->select_data($this->table_name, '*', 'season_id = ' . $season_id);
        if($season) {
            $season = Functions::array_flat($season);
            
            $this->season_id = $season['season_id'];
            $this->season_title = $season['season_title'];
            $this->season_number = $season['season_number'];
            $this->show_id = $season['show_id'];
        } else {
            return false;
        }
    }
    
    /**
     * Gets all the season from the database
     * @return boolean 
     */
    public function get_all_seasons() {
        $seasons = $this->db_wrapper->select_data($this->table_name, '*');
        if($seasons) return $seasons;
        else return false;
    }
    
    /**
     * Gets all the seasons in a show
     * @param int $show_id
     * @return boolean 
     */
    public function get_seasons_by_show($show_id) {
        $seasons = $this->db_wrapper->select_data($this->table_name, '*', 'show_id = ' . $show_id);
        if($seasons) return $seasons;
        else return false;
    }
    
    /**
     * Adds a new season
     * @param array $season_data
     * @return boolean 
     */
    public function add_season($season_data) {
        $success = $this->db_wrapper->insert_data($this->table_name, array(
            'season_title' => $season_data['title'],
            'season_number' => $season_data['number'],
            'show_id' => $season_data['show']
        ));
        if($success) return true;
        else return false;
    }
    
    /**
     * Deletes a single season by id
     * @param int $season_id
     * @return boolean 
     */
    public function delete_single_season($season_id) {
        $success = $this->db_wrapper->delete_data($this->table_name, 'season_id = ' . $season_id);
        if($success) return true;
        else return false;
    }
    
    /**
     * Deletes all the seasons in a show
     * @param int $show_id
     * @return boolean 
     */
    public function delete_seasons_in_show($show_id) {
        $success = $this->db_wrapper->delete_data($this->table_name, 'show_id = ' . $show_id);
        if($success) return true;
        else return false;
    }
    
    /**
     * Updates a season
     * @param array $season_data
     * @return boolean 
     */
    public function update_season($season_data) {
        $success = $this->db_wrapper->update_data($this->table_name, array(
            'season_title' => $season_data['title'],
            'season_number' => $season_data['number'],
            'show_id' => $season_data['show']
        ), 'season_id = ' . $season_data['id']);
        if($success) return true;
        else return false;
    }
}

?>
