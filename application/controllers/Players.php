<?php

/**
 * Shows a list of all players, their info and a picture.
 * 
 * controllers/Players.php
 *
 * @author Team Dolphins
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends Application {
    
    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    /**
     * Main function that displays all players on the team
     */
    function index() {
        
        // this is the view we want shown
        if($this->session->has_userdata('layout')) {
            $this->data['pagebody'] = $this->session->layout;
        } else {
            $this->data['pagebody'] = 'players_view';
        }
        
        
        
        //Pagination stuff
        $config['base_url'] = base_url().'players/index';
        $config['total_rows'] = $this->players_list->record_count();
        $config['per_page'] = 12; 
        $config['first_url'] = '1';
        $config['last_url'] = '1';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $orderby = "FIRSTNAME"; //The default field that will be sorted
        $orderdir = "asc"; //The default direction of the sort
        
        //Check if a custom sort by the user was selected
        if($this->session->has_userdata('order_by')) {
            $orderby = $this->session->order_by;
            $orderdir = $this->session->order_dir;
        }
        
        //Create the message to advise user of current sort order
        $currentSort = '';
        
        if($orderby == 'FIRSTNAME') {
            $currentSort .= ' First Name';
        } else if($orderby == 'LASTNAME') {
            $currentSort .= ' Last Name';
        } else if($orderby == 'PLAYERNUM') {
            $currentSort .= ' Jersey Number';
        } else if($orderby == 'POSITION') {
            $currentSort .= ' Position';
        }
        
        if($orderdir == 'asc') {
            $currentSort .= ' in ascending order.';
        } else {
            $currentSort .= ' in descending order.';
        }
        
        
        $this->data['ordermethod'] = $currentSort;
        
        $source = 
                $this->players_list->get($config["per_page"], $page, $orderby, $orderdir);

        $this->data["links"] = $this->pagination->create_links();
        
        //Create the options
        $options = array();
        $options[] = array('value' => '', 'text'=>'');
        $options[] = array('value' => 'FIRSTNAME', 'text'=>'First Name');
        $options[] = array('value' => 'LASTNAME', 'text'=>'Last Name');
        $options[] = array('value' => 'POSITION', 'text'=>'Position');
        $options[] = array('value' => 'PLAYERNUM', 'text'=>'Jersey Number');
        $this->data['options'] = $options;

        $layoutoptions = array();
        $layoutoptions[] = array('value' => '', 'text'=>'');
        $layoutoptions[] = array('value' => 'player_gallery', 'text'=>'Gallery');
        $layoutoptions[] = array('value' => 'players_view', 'text'=>'Table');
        $this->data['layoutoptions'] = $layoutoptions;

        // build the list of players, to pass on to our view
        $players = array();
        foreach ($source as $record) {
            $players[] = array('firstname' => $record['FIRSTNAME'], 'lastname' => $record['LASTNAME'], 
                'teamcode' => $record['TEAMCODE'], 'playernum' => $record['PLAYERNUM'], 
                'position' => $record['POSITION'], 'info' => $record['INFO'], 
                'image' => $record['IMAGE'], 'playerid' => $record['PLAYERID']);
        }
        $this->data['players'] = $players;

        $config['base_url'] = base_url();



        $this->render();
    }
    
    function order($orderby) {
        $sameOrderby = false;
        if($this->session->has_userdata('order_by')) {
            if($this->session->order_by == $orderby)
                $sameOrderby = true;
        }
        
        $this->session->set_userdata('order_by', $orderby);
        
        $orderdir = "asc";
        if($sameOrderby) {
            if($this->session->order_dir == "asc") {
                $orderdir = "desc";
            }
        }
        
        $this->session->set_userdata('order_dir', $orderdir);
        
        redirect('/players');
    }


    //Change the layout of the page - either table view or gallery view
    function changeLayout($layout) {
        $this->session->set_userdata('layout', $layout);

        redirect('/players');
    }
}
