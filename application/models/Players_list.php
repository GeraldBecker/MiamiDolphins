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

    public function record_count() {
        return $this->db->count_all("players");
    }

    public function get($limit, $start, $orderby, $orderdir) {
        $columns = array("FIRSTNAME", "LASTNAME", "PLAYERNUM", "POSITION");
        $orderby = (in_array($orderby, $columns)) ? $orderby : "FIRSTNAME";
        $orderdir = ($orderdir == "desc") ? "desc" : "asc";
        
        $this->db->limit($limit, $start);
        $this->db->order_by($orderby, $orderdir);
        $query = $this->db->get('players');
        return $query->result_array();
    }

}
