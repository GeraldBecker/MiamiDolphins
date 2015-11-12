<?php

/**
 * Obtains the data from the database that is used to display all the team names
 * from the NFL and what division and conference they are in. 
 *
 * @author Gerald Becker
 */
class Team_list extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /*
     * Pulls a listing of all the teams in the NFL.
     */
    public function allTeams() {
        $this->db->order_by("CONFERENCE", "asc");        
        $this->db->order_by("DIVISION", "asc");
        $query = $this->db->get('teams');
        return $query->result_array();
    }
    

}
