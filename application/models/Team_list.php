<?php

/**
 * 
 *
 * @author Gerald Becker
 */
class Team_list extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
    }

    
    public function allTeams() {
        $this->db->order_by("CONFERENCE", "asc");        
        $this->db->order_by("DIVISION", "asc");
        $query = $this->db->get('teams');
        return $query->result_array();
    }
    

}
