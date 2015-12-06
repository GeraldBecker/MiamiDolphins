<?php

/**
 * Provides editing methods for player records.
 * 
 * controllers/Player.php
 *
 * ------------------------------------------------------------------------
 */
class Player extends Application {

    function __construct()
    {
	parent::__construct();
        

    }
    
    function index()
    {
        $this->data['title'] = 'Player Profile Maintenance';
    	$this->data['pagebody'] = 'player_edit';       
    	$this->render();
    }
    
    // Add a new player
    function add()
    {        
        $player = $this->player_edit->create();
        $this->present($player);
    }
    
    // Edit an existing player
    function edit($playerid)
    {   
        $player = $this->player_edit->get($playerid);
        $this->present($player);
    }
    
    // Delete an existing player
    function delete($playerid)
    {   
        $player = $this->player_edit->delete($playerid);
        //$this->present($player);
    }

    // Present a player for adding/editing
    function present($player)
    {
        // format any errors
        $message = '';
        if(count($this->errors) > 0)
        {
            foreach ($this->errors as $invalid) 
            {
                $message .= $invalid . ' . . . ';                
            }          
        }
        $this->data['message'] = $message;        
        $this->data['fplayerid'] = makeTextField('Player ID', 'playerid', $player->PLAYERID, '', 10, 10);
        $this->data['ffirstname'] = makeTextField('First Name', 'firstname', $player->FIRSTNAME);
        $this->data['flastname'] = makeTextField('Last Name', 'lastname', $player->LASTNAME);       
        $this->data['fteamcode'] = makeTextField('Team Code', 'teamcode', $player->TEAMCODE);
        $this->data['fplayernum'] = makeTextField('Jersey Number', 'playernum', $player->PLAYERNUM);
        $this->data['fposition'] = makeTextField('Position', 'position', $player->POSITION);
        $this->data['fimage'] = makeTextField('Photo File Name', 'image', $player->IMAGE);
        $this->data['finfo'] = makeTextArea('Player History', 'info', $player->INFO);   
        
        $this->data['fsubmit'] = makeSubmitButton('Save', 
                "Click here to validate the player data", 'btn-success');
       $this->data['fdelete'] = makeSubmitButton('Delete', 
                "Click here to delete the player", 'btn-success');
       $this->data['fcancel'] = makeSubmitButton('Cancel', 
                "Click here to cancel the change", "submitbutton", "cancel", 'btn-success');
        
        $this->data['pagebody'] = 'player_edit';
        $this->data['title'] = 'Player Profile Maintenance';
        $this->render();
    }
    
    // Process a player edit
    function confirm()
    {
        $formSubmit = $this->input->post('submitType');
        if( $formSubmit == 'cancel' )
            redirect('/players');
        
        $record = $this->player_edit->create();
        
        // Extract submitted fields
        $record->PLAYERID = $this->input->post('playerid');
        $record->FIRSTNAME = $this->input->post('firstname');
        $record->LASTNAME = $this->input->post('lastname');
        $record->TEAMCODE = $this->input->post('teamcode');
        $record->PLAYERNUM = $this->input->post('playernum');
        $record->POSITION = $this->input->post('position');
        $record->IMAGE = $this->input->post('image');
        $record->INFO = $this->input->post('info');
        
        
        if( $formSubmit == 'delete' ) {
            $this->player_edit->delete($record->PLAYERID);
            redirect('/players');
        }
        
        
        // Validate record
        if(empty($record->FIRSTNAME))
            $this->errors[] = 'You must specify a first name.';
        if(empty($record->LASTNAME))
            $this->errors[] = 'You must specify a last name.';
        if(empty($record->TEAMCODE))
            $this->errors[] = 'You must specify a team code.';
        if(empty($record->PLAYERNUM))
            $this->errors[] = 'You must specify a jersey number.';
        if(empty($record->POSITION))
            $this->errors[] = 'You must specify a position.';
        if(empty($record->IMAGE))
            $this->errors[] = 'You must specify a photo file name.';
        if(empty($record->INFO))
            $this->errors[] = 'You must specify some player history.';
        
        if(strlen($record->INFO) < 20)
            $this->errors[] = 'A player history must be at least 20 characters long.';
        
        // Redisplay if any errors
        if(count($this->errors) > 0)
        {
            $this->present($record);
            return; // make sure we don't try to save anything
        }
        
        // Save record
        if(empty($record->PLAYERID))
            $this->player_edit->add($record);
        else
        {
            $this->player_edit->update($record);              
        }
        
        redirect('/players');
    }
    
    function do_upload()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            return null;
        }
        else
        {
            $file = $this->upload->data('photo');
            $nameoffile = $this->upload->data('file_name');
            return $nameoffile;
        }
        
        
    }
}

/* End of file Player.php */
/* Location: application/controllers/Player.php */