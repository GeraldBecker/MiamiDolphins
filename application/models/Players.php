<?php

/**
 * Players Model
 * 
 * Provides all the CRUDdy methods for accessing and manipulating the data 
 * in the Players table.
 * 
 * models/Players.php
 *
 * @author Kevin Tangeman
 */
class Players extends MY_Model {
   
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
