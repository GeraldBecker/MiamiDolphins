<?php
defined('BASEPATH') OR exit('No direct script access allowed');

///
// The home page for the application
//
// Author: Wilson
///
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

	//Set up the dropdown and button for predictions.
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

	//check to see if this team code exists in the database
	function exists($team) {
		$allentries = $this->team_list->allTeams();

		foreach ($allentries as $entry) {
			if ($entry['TEAMCODE'] == $team) {
				return true;
			}
		}

		return false;
	}

	//Predict scores
	public function predict() {
		// detect non-AJAX entry
        if (!isset($_POST['team'])) 
        	redirect("/");

		$oppTeam = $this->input->post('team');

		//make sure we have a valid team code
		if (!$this->exists($oppTeam)) {
			echo 'Invalid team';
			exit();
		}

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
	    exit();
	}

	// Get the overall average score per game for a team.
	function overallAverage($teamcode) {
    	$sum = 0;
    	$count = 0;
   		$scores = $this->scoredownloads->get_team_scores($teamcode);

   		// add up all the scores and get the count for the average
   		foreach ($scores['home'] as $score) {
   			$sum += $score->HOMESCORE;
   			$count++;
   		}
   		foreach ($scores['away'] as $score) {
   			$sum += $score->AWAYSCORE;
   			$count++;
   		}
   		if ($count == 0)
   			return 0;

   		return $sum / $count;
	}

	// Get average score per game for a team's lsat five games
	function lastFiveAverage($teamcode) {
   		$sum = 0;
   		$count = 0;
   		$lastFive = $this->scoredownloads->get_last_five_scores($teamcode);

   		// add up all the scores and get the count for the average
   		foreach ($lastFive as $score) {
   			if ($score['HOMETEAMCODE'] == $teamcode) {
   				$sum += $score['HOMESCORE'];
   			} else if ($score['AWAYTEAMCODE'] == $teamcode) {
   				$sum += $score['AWAYSCORE'];
   			}
   			$count++;
   		}

   		if ($count == 0) 
   			return 0;

   		return $sum / $count;
	}

	// Get the average score per game for a team's last five games against another team
	function lastFiveAgainst($teamcode, $oppteamcode) {
		$sum = 0;
		$count = 0;
		$lastFive = $this->scoredownloads->get_last_five_against($teamcode, $oppteamcode);

		// add up all the scores and get the count for the average
		foreach ($lastFive as $score) {
			if ($score['HOMETEAMCODE'] == $teamcode) {
				$sum += $score['HOMESCORE'];
			} else if ($score['AWAYTEAMCODE'] == $teamcode) {
				$sum += $score['AWAYSCORE'];
			}
			$count++;
		}
		if ($count == 0) 
			return 0;

		return $sum / $count;
	}

	// Predict a team's score based on their average scores
	function predictScore($overall, $lastFive, $headToHead) {
		return round((0.70 * $overall) + (0.20 * $lastFive) + (0.10 * $headToHead));
	}
}
