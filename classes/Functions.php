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
 * Important functions
 *
 * @author Sunnefa Lind <sunnefa_lind@hotmail.com>
 */
class Functions {
    
    /**
    * Turns a multidimensional array into a single dimensional array
    * @param array $array
    * @return array 
    */
    public static function array_flat($array) {
        $single = array();
        foreach($array as $one) {
            foreach($one as $key => $value) {
            $single[$key] = $value;	
            }
        }
        return $single;
    }
    
    /**
    * Replaces tokens in a given string with replacements given
    * @param string $text
    * @param array $tokens_replacements
    * @return string 
    */
    public static function replace_tokens($text, $tokens_replacements) {
        foreach($tokens_replacements as $token => $replacement) {
            $text = preg_replace('(\{' . $token . '\})', $replacement, $text);
        }

        return $text;
    }
}

?>
