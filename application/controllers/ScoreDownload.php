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

class ScoreDownload extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        // get the list of airports that can be flown from
        $list = array();
        if (LOCAL) {
            // totally local operation
            //$this->load->model('airline');
            //$list = $this->airline->airports();
        } else {
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
        }
        //var_dump($list);
        
        // prepare the list for presentation
        $scores = array();
        foreach ($list as $arrayKey => $arrayValue) {
            $row = array('number' => $arrayValue['number'], 
                'away' => $arrayValue['away'], 
                'home' => $arrayValue['home'],
                'date' => $arrayValue['date'],
                'score' => $arrayValue['score']);
            
            $scores[] = $row;
        }
        //sort($scores);
        $this->data['scores'] = $scores;

        // Present the list to choose from
        $this->data['pagebody'] = 'score_download';
        $this->render();
    }
}