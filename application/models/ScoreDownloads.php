<?php

/**
 * ScoreDownloads Model
 * 
 * Provides the CRUD methods for accessing and manipulating the data 
 * in the Scores table.
 * 
 * models/ScoreDownloads.php
 *
 * @author Gerald Becker
 */
class ScoreDownloads extends MY_Model {
   
    public function __construct() {
        parent::__construct('game_history', 'HISTORYID');
    }
    
    /**
     * 
     */
    public function all() {
        /*$this->db->order_by("LASTNAME", "asc");        
        $query = $this->db->get('players');
        return $query->result_array();*/
        
        
    }
    
    function add_score($homecode, $awaycode, $homescore, $awayscore, $date, $scoreentry) {
        $record = $this->create();
        $record->HOMETEAMCODE = $homecode;
        $record->AWAYTEAMCODE = $awaycode;
        $record->HOMESCORE = $homescore;
        $record->AWAYSCORE = $awayscore;
        $record->DATE = $date;
        $record->SCOREENTRY = $scoreentry;
        
        $this->add($record);
    }
    
    function get_team_scores($teamcode) {
        $records = array($this->some('HOMETEAMCODE', $teamcode), $this->some('AWAYTEAMCODE', $teamcode));
        return $records;
    }
    
    function detele_scores() {
        $this->deleteall();
    }
}
