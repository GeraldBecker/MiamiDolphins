<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
	 	$this->load->model('members');

		$this->data['pagebody'] = 'welcome';

		$members = $this->members->all();

        $member_list = array();

        //build an array of members
        foreach ($members as $m) {
            $member_list[] = array('id' => $m['id'], 'name' => $m['name'], 'image'=>$m['pic'] );
        }

        $this->data['member_list'] = $member_list;
        
		$this->render();
		
	}
}
