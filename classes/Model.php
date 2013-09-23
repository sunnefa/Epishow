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
 * Description of Model
 *
 * @author Sunnefa Lind <sunnefa_lind@hotmail.com>
 */
class Model {
    
    /**
     * A reference to DBWrapper
     * @var DBWrapper 
     */
    protected $db_wrapper;
    
    /**
     * The name of the database table the model uses
     * @var string 
     */
    protected $table_name;
    
    /**
     * Getter for class properties. Properties cannot be set publicly
     * @param string $name
     * @return mixed 
     */
    public function __get($name) {
        if(isset($this->$name)) {
            return $this->name;
        }
    }
    
    /**
     * Getter for all class properties in an array
     * @return array 
     */
    public function get_array() {
        $values = get_object_vars($this);
        unset($values['db_wrapper']);
        return $values;
    }
    
}

?>
