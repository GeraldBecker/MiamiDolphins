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
        //$this->load->library('session');
    }
    
    /*
     * Loads the team page and builds the array to be used by making a call
     * to the team list model.
     * 
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
        
        //Pagination stuff
        $config['base_url'] = base_url().'teams/index';
        $config['total_rows'] = $this->team_list->record_count();
        $config['per_page'] = 12; 
        $config['first_url'] = '1';
        $config['last_url'] = '1';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        //$orderby = "CITY"; //The default field that will be sorted
        //$orderdir = "asc"; //The default direction of the sort
        
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
        //} else if($orderby == 'STANDING') {
        //    $currentSort .= ' Standing';        
        }
        
        if($orderdir == 'asc') {
            $currentSort .= ' in ascending order.';
        } else {
            $currentSort .= ' in descending order.';
        }               
        $this->data['teamordermethod'] = $currentSort;
        
        $source = $this->team_list->get($config["per_page"], $page, $orderby, $orderdir);

        $this->data["teamlinks"] = $this->pagination->create_links();
        
        //Create the options
        $options = array();
        $options[] = array('value' => '', 'text'=>'');
        $options[] = array('value' => 'CITY', 'text'=>'City');
        $options[] = array('value' => 'NAME', 'text'=>'Team Name');
        //$options[] = array('value' => 'STANDING', 'text'=>'Standing');       
        $this->data['teamsortoptions'] = $options;

        $layoutoptions = array();
        $layoutoptions[] = array('value' => '', 'text'=>'');
        $layoutoptions[] = array('value' => 'teams', 'text'=>'League');
        $layoutoptions[] = array('value' => 'teams_conf', 'text'=>'Conference');
        $layoutoptions[] = array('value' => 'teams_div', 'text'=>'Division');
        $this->data['teamlayoutoptions'] = $layoutoptions;

        
        //get all the teams from our model
        //$teams = $this->team_list->allTeams();       
        
        $teamList = array();
        //build an array of data
        foreach ($source as $team) {
            $teamList[] = array('city' => $team['CITY'], 'name' => $team['NAME'], 'division' => $team['DIVISION'], 
                'teamcode'=>$team['TEAMCODE'], 'conference'=>$team['CONFERENCE'], 
                'image'=>$team["IMAGE"]);
        }
        
        $this->data['teamlist'] = $teamList;
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
}