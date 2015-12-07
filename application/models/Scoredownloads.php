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
class Scoredownloads extends MY_Model {
   
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
    
    //Get all the scores (both home and away) for a team
    function get_team_scores($teamcode) {
        $records = array('home' => $this->some('HOMETEAMCODE', $teamcode), 'away' => $this->some('AWAYTEAMCODE', $teamcode));
        return $records;
    }

    //Get the last five scores for a particular team
    function get_last_five_scores($teamcode) {
        $where = "HOMETEAMCODE='$teamcode' OR AWAYTEAMCODE='$teamcode'";
        $this->db->where($where);
        $query = $this->db->get('game_history', 5);
        return $query->result_array();
    }

    //Get the last five scores for a team against another
    function get_last_five_against($teamcode, $oppTeamCode) {
        $where = "(HOMETEAMCODE='$teamcode' OR AWAYTEAMCODE='$teamcode') AND 
                  (HOMETEAMCODE='$oppTeamCode' OR AWAYTEAMCODE='$oppTeamCode')";
        $this->db->where($where);
        $query = $this->db->get('game_history', 5);
        return $query->result_array();
    }

    
    function detele_scores() {
        $this->deleteall();
    }
}
