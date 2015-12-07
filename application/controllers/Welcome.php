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
		$oppTeam = $this->input->post('team');
	    //if $this->input->post('team') does not exist in db
	    	//echo 'Invalid team';
			//exit;

	    $CI = &get_instance();


    	//Get the average for all games
	    $overall = $this->overallAverage('MIA');
	    $overallOpp = $this->overallAverage($oppTeam);


   		//Get the average for the last five games
	    $lastFive = $this->lastFiveAverage('MIA');
	    $lastFiveOpp = $this->lastFiveAverage($oppTeam)	;

	    //Get the average against the other team
	    $against = $this->lastFiveAgainst('MIA', $oppTeam);
	    $againstOpp = $this->lastFiveAgainst($oppTeam, 'MIA');

	    $ourScore = $this->predictScore($overall, $lastFive, $against);
	    $oppScore = $this->predictScore($overallOpp, $lastFiveOpp, $againstOpp);

	    $params = array(
	    	'opponent' => $this->input->post('team'),
	    	'ourScore' => $ourScore,
	    	'oppScore' => $oppScore
    	);

	    echo $CI->parser->parse('prediction_view', $params, true);
	    exit;
	}

	function wonGame($ourScore, $oppScore) {
		if ($ourScore !== $oppScore) {
			return $ourScore > $oppScore;
		} 
		return "TIE";
	}

	function overallAverage($teamcode) {
    	$sumAll = 0;
    	$countAll = 0;
   		$scores = $this->scoredownloads->get_team_scores($teamcode);
   		foreach ($scores['home'] as $score) {
   			$sumAll += $score->HOMESCORE;
   			$countAll++;
   		}
   		foreach ($scores['away'] as $score) {
   			$sumAll += $score->AWAYSCORE;
   			$countAll++;
   		}
   		return $sumAll / $countAll;
	}

	function lastFiveAverage($teamcode) {
   		$sumFive = 0;
   		$countFive = 0;
   		$lastFive = $this->scoredownloads->get_last_five_scores($teamcode);
   		foreach ($lastFive as $score) {
   			if ($score['HOMETEAMCODE'] === $teamcode) {
   				$sumFive += $score['HOMESCORE'];
   			} else if ($score['AWAYTEAMCODE'] === $teamcode) {
   				$sumFive += $score['AWAYSCORE'];
   			}
   			$countFive++;
   		}
   		return $sumFive / $countFive;
	}

	function lastFiveAgainst($teamcode, $oppteamcode) {
		$sum = 0;
		$count = 0;
		$lastFive = $this->scoredownloads->get_last_five_against($teamcode, $oppteamcode);
		foreach ($lastFive as $score) {
			if ($score['HOMETEAMCODE'] === $teamcode) {
				$sum += $score['HOMESCORE'];
			} else if ($score['AWAYTEAMCODE'] == $teamcode) {
				$sum += $score['AWAYSCORE'];
			}
			$count++;
		}
		if ($count === 0) 
			return 0;

		return $sum / $count;
	}

	function predictScore($overall, $lastFive, $headToHead) {
		return round((0.70 * $overall) + (0.20 * $lastFive) + (0.10 * $headToHead));
	}
}
