<?php

/**
 * Players_list
 * 
 * Retrieves all the data from the Players table.
 * 
 * models/Players_list.php
 *
 * @author Kevin
 */
class Players_list extends CI_Model {
   
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Retrieve all of the players data
     */
    public function all() {
        $this->db->order_by("LASTNAME", "asc");        
        $query = $this->db->get('players');
        return $query->result_array();
    }
}
