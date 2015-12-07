<?php

/* 
 * Pulls the scores from an RPC source. 
 * 
 * controllers/ScoreDownload.php.
 * 
 * @author Team Dolphins
 */

defined('BASEPATH') OR exit('No direct script access allowed');
define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('http://nfl.jlparry.com/rpc'));    // endpoint fo the XML-RPC server    
define('RPCPORT', 80); // port the XML-RPC service is listening on

class Scoredownload extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        //Create a blank list
        $list = array();
        
        // use XML-RPC to get the list
        $this->load->library('xmlrpc');
        $this->xmlrpc->server(RPCSERVER, RPCPORT);
        //$this->xmlrpc->method('getOrigins');
        $this->xmlrpc->method('since');
        $request = array(); //"20150803"
        $this->xmlrpc->request($request);
        
        //$this->xmlrpc->set_debug(true); // dont turn this on all the time
        
        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
            echo '<br/>' . var_dump($this->xmlrpc->response) . '<br/>';
        }

        $list = $this->xmlrpc->display_response();
        
        
        // prepare the list for presentation
        
        //Delete the current scores in the database
        $this->scoredownloads->detele_scores();
        
        $scores = array();
        foreach ($list as $arrayKey => $arrayValue) {
            $scoreSet = explode(":", $arrayValue['score']);
            
            $homecode = $arrayValue['home'];
            $awaycode = $arrayValue['away'];
            $homescore = $scoreSet[1];
            $awayscore = $scoreSet[0];
            $date = $arrayValue['date'];
            $scoreentry = $arrayValue['number'];
            
            $row = array('scoreentry' => $scoreentry, 
                'home' => $homecode,
                'away' => $awaycode, 
                'date' => $date,
                'homescore' => $homescore,
                'awayscore' => $awayscore);
            
            $scores[] = $row;
            
            //Add the scores to the database
            $this->scoredownloads->add_score($homecode, $awaycode, $homescore, $awayscore, $date, $scoreentry);
        }

        $this->data['scores'] = $scores;

        // Present the list to choose from
        $this->data['pagebody'] = 'score_download';
        $this->data['title'] = 'NFL Scores'; //Title on the page
        $this->render();
    }
}