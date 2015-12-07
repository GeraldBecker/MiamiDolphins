<?php

/* 
 * Lists all of the teams in the NFL with the division and conference. Also the team
 * logo is shown beside the team. 
 * 
 * controllers/Teams.php.
 * 
 * @author Team Dolphins
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends Application {
    function __construct() 
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
    }
    
    /*
     * Loads the team page and builds the array to be used by making a call
     * to the team list model.
     */
    public function index()
    {
        // this is the team view we want shown
        if($this->session->has_userdata('team_layout')) {
            $this->data['pagebody'] = $this->session->team_layout;
        } else {
            $this->data['pagebody'] = 'teams';
        }

        $this->data['title'] = 'NFL Teams'; //Title on the page
        $this->data['pageTitle'] = 'NFL Teams';   // Page title                                
        
        //Check if a custom sort by the user was selected
        if($this->session->has_userdata('team_order_by')) {
            $orderby = $this->session->team_order_by;
            $orderdir = $this->session->team_order_dir;
        }
        else {
            $orderby = "CITY"; //The default field that will be sorted
            $orderdir = "asc"; //The default direction of the sort            
        }
        
        //Create the message to advise user of current sort order
        $currentSort = '';
        
        if($orderby == 'CITY') {
            $currentSort .= ' City';
        } else if($orderby == 'NAME') {
            $currentSort .= ' Team Name';
        } else if($orderby == 'STANDING') {
            $currentSort .= ' Standing';        
        }
        
        if($orderdir == 'asc') {
            $currentSort .= ' in ascending order.';
        } else {
            $currentSort .= ' in descending order.';
        }               
        $this->data['teamordermethod'] = $currentSort;                
        
        //Create the options
        $options = array();
        $options[] = array('value' => '', 'text'=>'');
        $options[] = array('value' => 'CITY', 'text'=>'City');
        $options[] = array('value' => 'NAME', 'text'=>'Team Name');
        $options[] = array('value' => 'STANDING', 'text'=>'Standing');       
        $this->data['teamsortoptions'] = $options;

        $layoutoptions = array();
        $layoutoptions[] = array('value' => '', 'text'=>'');
        $layoutoptions[] = array('value' => 'teams', 'text'=>'League');
        $layoutoptions[] = array('value' => 'teams_conf', 'text'=>'Conference');
        $layoutoptions[] = array('value' => 'teams_div', 'text'=>'Division');
        $this->data['teamlayoutoptions'] = $layoutoptions;
              
        // get all the teams for the League layout
        $source = $this->team_list->get($orderby, $orderdir);
        $teamList = array();
        foreach ($source as $team) {
            $stats = $this->team_list->getStats($team['TEAMCODE']);
            $wins = $losses = $ptsfor = $ptsagainst = $ptsnet = 0;
            
            foreach($stats as $statentry) {
                if($statentry['HOMETEAMCODE'] == $team['TEAMCODE']) {
                    $ptsfor += $statentry['HOMESCORE'];
                    $ptsagainst += $statentry['AWAYSCORE'];
                    if($statentry['HOMESCORE'] > $statentry['AWAYSCORE']) {
                        $wins++;
                    } else {
                        $losses++;
                    }
                } else {
                    $ptsfor += $statentry['AWAYSCORE'];
                    $ptsagainst += $statentry['HOMESCORE'];
                    if($statentry['HOMESCORE'] < $statentry['AWAYSCORE']) {
                        $wins++;
                    } else {
                        $losses++;
                    }
                }
            }
            
            $ptsnet = $ptsfor - $ptsagainst;
            
            $teamList[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
        }        
        
        if($orderby == 'STANDING') {
            if($orderdir == 'asc') {
                usort($teamList, "Teams::standingsortasc");
            } else {
                usort($teamList, "Teams::standingsortdesc");
            }
        }
        
        $this->data['teamlist'] = $teamList;        
        
       // get all the AFC teams for the Conference layout
        $AFCsource = $this->team_list->getAFCTeams($orderby, $orderdir);
        $teamListAFC = array();
        $teamListAFCNorth = array();
        $teamListAFCSouth = array();
        $teamListAFCEast = array();
        $teamListAFCWest = array();
        foreach ($AFCsource as $team) {
            $stats = $this->team_list->getStats($team['TEAMCODE']);
            $wins = $losses = $ptsfor = $ptsagainst = $ptsnet = 0;
            
            foreach($stats as $statentry) {
                if($statentry['HOMETEAMCODE'] == $team['TEAMCODE']) {
                    $ptsfor += $statentry['HOMESCORE'];
                    $ptsagainst += $statentry['AWAYSCORE'];
                    if($statentry['HOMESCORE'] > $statentry['AWAYSCORE']) {
                        $wins++;
                    } else {
                        $losses++;
                    }
                } else {
                    $ptsfor += $statentry['AWAYSCORE'];
                    $ptsagainst += $statentry['HOMESCORE'];
                    if($statentry['HOMESCORE'] < $statentry['AWAYSCORE']) {
                        $wins++;
                    } else {
                        $losses++;
                    }
                }
            }
            
            $ptsnet = $ptsfor - $ptsagainst;
            
            
            $teamListAFC[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            if($team['DIVISION'] == "AFC North"){
                $teamListAFCNorth[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }elseif($team['DIVISION'] == "AFC South"){
                $teamListAFCSouth[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }elseif($team['DIVISION'] == "AFC East"){
                $teamListAFCEast[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }elseif($team['DIVISION'] == "AFC West"){
                $teamListAFCWest[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }
        }        
        
        if($orderby == 'STANDING') {
            if($orderdir == 'asc') {
                usort($teamListAFC, "Teams::standingsortasc");
                usort($teamListAFCNorth, "Teams::standingsortasc");
                usort($teamListAFCSouth, "Teams::standingsortasc");
                usort($teamListAFCEast, "Teams::standingsortasc");
                usort($teamListAFCWest, "Teams::standingsortasc");
            } else {
                usort($teamListAFC, "Teams::standingsortdesc");
                usort($teamListAFCNorth, "Teams::standingsortdesc");
                usort($teamListAFCSouth, "Teams::standingsortdesc");
                usort($teamListAFCEast, "Teams::standingsortdesc");
                usort($teamListAFCWest, "Teams::standingsortdesc");
            }
        }
        
        
        $this->data['teamListAFC'] = $teamListAFC;  
        $this->data['teamListAFCNorth'] = $teamListAFCNorth;
        $this->data['teamListAFCSouth'] = $teamListAFCSouth;
        $this->data['teamListAFCEast'] = $teamListAFCEast;
        $this->data['teamListAFCWest'] = $teamListAFCWest;
        
        // get all the NFC teams for the Conference layout
        $NFCsource = $this->team_list->getNFCTeams($orderby, $orderdir);
        $teamListNFC = array();
        $teamListNFCNorth = array();
        $teamListNFCSouth = array();
        $teamListNFCEast = array();
        $teamListNFCWest = array();
        foreach ($NFCsource as $team) {
            $stats = $this->team_list->getStats($team['TEAMCODE']);
            $wins = $losses = $ptsfor = $ptsagainst = $ptsnet = 0;
            
            foreach($stats as $statentry) {
                if($statentry['HOMETEAMCODE'] == $team['TEAMCODE']) {
                    $ptsfor += $statentry['HOMESCORE'];
                    $ptsagainst += $statentry['AWAYSCORE'];
                    if($statentry['HOMESCORE'] > $statentry['AWAYSCORE']) {
                        $wins++;
                    } else {
                        $losses++;
                    }
                } else {
                    $ptsfor += $statentry['AWAYSCORE'];
                    $ptsagainst += $statentry['HOMESCORE'];
                    if($statentry['HOMESCORE'] < $statentry['AWAYSCORE']) {
                        $wins++;
                    } else {
                        $losses++;
                    }
                }
            }
            
            $ptsnet = $ptsfor - $ptsagainst;
            
            $teamListNFC[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            if($team['DIVISION'] == "NFC North"){
                $teamListNFCNorth[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }elseif($team['DIVISION'] == "NFC South"){
                $teamListNFCSouth[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }elseif($team['DIVISION'] == "NFC East"){
                $teamListNFCEast[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }elseif($team['DIVISION'] == "NFC West"){
                $teamListNFCWest[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"],
                'wins' => $wins, 'losses' => $losses, 'ptsfor' => $ptsfor, 'ptsagainst' => $ptsagainst, 'ptsnet' => $ptsnet);
            }
        }        
        
        if($orderby == 'STANDING') {
            if($orderdir == 'asc') {
                usort($teamListNFC, "Teams::standingsortasc");
                usort($teamListNFCNorth, "Teams::standingsortasc");
                usort($teamListNFCSouth, "Teams::standingsortasc");
                usort($teamListNFCEast, "Teams::standingsortasc");
                usort($teamListNFCWest, "Teams::standingsortasc");
            } else {
                usort($teamListNFC, "Teams::standingsortdesc");
                usort($teamListNFCNorth, "Teams::standingsortdesc");
                usort($teamListNFCSouth, "Teams::standingsortdesc");
                usort($teamListNFCEast, "Teams::standingsortdesc");
                usort($teamListNFCWest, "Teams::standingsortdesc");
            }
        }
        
        $this->data['teamListNFC'] = $teamListNFC; 
        $this->data['teamListNFCNorth'] = $teamListNFCNorth;
        $this->data['teamListNFCSouth'] = $teamListNFCSouth;
        $this->data['teamListNFCEast'] = $teamListNFCEast;
        $this->data['teamListNFCWest'] = $teamListNFCWest;
        
        $config['base_url'] = base_url();
        $this->render();                
    }           
    
    function order($orderby) {
        $sameOrderby = false;
        if($this->session->has_userdata('team_order_by')) {
            if($this->session->team_order_by == $orderby) {
                $sameOrderby = true;
            }
        }
        
        $this->session->set_userdata('team_order_by', $orderby);
        
        $orderdir = "asc";
        if($sameOrderby) {
            if($this->session->team_order_dir == "asc") {
                $orderdir = "desc";
            }
        }
        
        $this->session->set_userdata('team_order_dir', $orderdir);
        
        redirect('/teams');
    }


    //Change the layout of the page - either league, conference or division view
    function changeLayout($layout) {
        $this->session->set_userdata('team_layout', $layout);

        redirect('/teams');
    }
    
    function standingsortasc($a, $b) {
        return $a["ptsnet"] > $b["ptsnet"];
    }
    
    function standingsortdesc($a, $b) {
        return $a["ptsnet"] < $b["ptsnet"];
    }
}