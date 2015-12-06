<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
		//$this->load->helper('')
		$this->load->helper('form');

	 	$this->load->model('members');

		$this->data['pagebody'] = 'welcome';

		$members = $this->members->all();

        $member_list = array();

        //build an array of members
        foreach ($members as $m) {
            $member_list[] = array('id' => $m['id'], 'name' => $m['name'], 'image'=>$m['pic'] );
        }

        $this->data['member_list'] = $member_list;
        $this->makePredictionForm();
		$this->render();
		
	}

	private function makePredictionForm() {
		$teams = $this->team_list->allTeams();
		$teamList = array();
		foreach ($teams as $team) {
			if ($team["TEAMCODE"] != "MIA") {
				$teamList[$team["TEAMCODE"]] = $team["CITY"];
			}
		}

		$this->data['teams'] =  form_dropdown('teams', $teamList, '', 'id="teams"');

		$this->data['predict_button'] = form_button('predict_button', 'Make Prediction', 'onClick="predict()"');
	}

	public function predict() {
	    //if $this->input->post('team') does not exist in db
	    	//echo 'Invalid team';
			//exit;

	    $CI = &get_instance();
	    $params = array(
	    	'winner' => 'MIA',
	    	'loser' => $this->input->post('team'),
	    	'winscore' => 100,
	    	'losescore' => 99
    	);

	    echo $CI->parser->parse('prediction_view', $params, true);
	    exit;
	}
}
