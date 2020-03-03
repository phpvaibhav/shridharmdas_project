<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Common_Front_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        //$this->check_user_session();
    }//End Function

    public function index() { 
        $data['title'] = "welcome";
        $data['front_styles'] = array();
        $data['front_scripts'] = array();
        $this->load->front_render('welcome',$data);
    }//End Function 
}//End Class