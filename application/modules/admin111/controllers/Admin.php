<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        //$this->check_admin_user_session();
    }//End Function

    public function index() { 
        $data['title'] = "welcome";
        $this->load->login_render('welcome', $data);
    }//End Function
}//End Class