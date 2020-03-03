<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Union extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Union');
        $this->load->admin_render('union/index', $data, '');
    } //End function
}//End Class