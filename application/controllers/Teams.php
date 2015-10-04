<?php

/* 
 * controllers/Teams.php.
 * 
 * @author Gerald Becker
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends Application {
    
    
    public function index()
    {
        $this->data['pagebody'] = 'teams';    // this is the view we want shown
        
        //get all the teams from our model
        $teams = $this->team_list->allTeams();
        
        
        $teamList = array();
        //build an array of data
        foreach ($teams as $team) {
            $teamList[] = array('team' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"]);
        }
        
        $this->data['teamlist'] = $teamList;
        $this->render();
        
        
    }
    
    
}