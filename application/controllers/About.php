<?php

/* 
 * controllers/About.php
 * 
 * @author Becky Zhou
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application {
    
    
    public function index()
    {
        $this->data['pagebody'] = 'about';    // this is the view we want shown
        
        $this->render();
        
        
    }
    
    
}