<?php

/**
 * Shows a list of all players, their info and a picture.
 * 
 * controllers/Players.php
 *
 * @author Kevin Tangeman
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends Application {
    
    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        //$this->load->library('uri');
    }

    /**
     * Main function that displays all players on the team
     */
    function index() {
        
        // this is the view we want shown
        $this->data['pagebody'] = 'players_view';
        
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

        $source = 
                $this->players_list->get($config["per_page"], $page);

        $this->data["links"] = $this->pagination->create_links();


        // build the list of players, to pass on to our view
        $players = array();
        foreach ($source as $record) {
            $players[] = array('firstname' => $record['FIRSTNAME'], 'lastname' => $record['LASTNAME'], 'teamcode' => $record['TEAMCODE'],
                'playernum' => $record['PLAYERNUM'], 'position' => $record['POSITION'], 'info' => $record['INFO'], 'image' => $record['IMAGE']);
        }
        $this->data['players'] = $players;

        $config['base_url'] = base_url();



        $this->render();
    }
}
