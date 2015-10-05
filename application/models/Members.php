<?php
/**
 *
 * @author Wilson Carpenter
 */

class Members extends CI_Model {

	var $data = array(
		array('id' => '1', 'name' => 'Gerald Becker',
		 'pic' => 'gbecker.jpeg'),
		array('id' => '2', 'name' => 'Becky Zhou', 
			'pic' => 'bzhou.png'),
		array('id' => '3', 'name' => 'Kevin Tangeman', 
			'pic' => 'ktangeman.png'),
		array('id' => '4', 'name' => 'Wilson Carpenter', 
			'pic' => 'wcarpenter.jpeg'),
	);

	public function __construct() {
        parent::__construct();
    }
    
	
    public function all() {
        return $this->data;
    }

}