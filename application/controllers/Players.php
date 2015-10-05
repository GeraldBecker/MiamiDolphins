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
    }

    /**
     * Main function that displays all players on the team
     */
    function index() {
        
        // this is the view we want shown
        $this->data['pagebody'] = 'players_view';
        
        // build the list of players, to pass on to our view
        $source = $this->players_list->all();
        
        $players = array();
        foreach ($source as $record) {
            $players[] = array('firstname' => $record['FIRSTNAME'], 'lastname' => $record['LASTNAME'], 'teamcode' => $record['TEAMCODE'],
                'playernum' => $record['PLAYERNUM'], 'position' => $record['POSITION'], 'info' => $record['INFO'], 'image' => $record['IMAGE']);
        }
        $this->data['players'] = $players;

        $this->render();
    }
}
