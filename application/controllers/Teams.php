<?php

/* 
 * Lists all of the teams in the NFL with the division and conference. Also the team
 * logo is shown beside the team. 
 * 
 * controllers/Teams.php.
 * 
 * @author Gerald Becker
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends Application {
    
    /*
     * Loads the team page and builds the array to be used by making a call
     * to the team list model.
     * 
     */
    public function index()
    {
        $this->data['pagebody'] = 'teams';    // this is the view we want shown
        $this->data['title'] = 'NFL Teams'; //Title on the page
        $this->data['pageTitle'] = 'NFL Teams';   // Page title
        
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