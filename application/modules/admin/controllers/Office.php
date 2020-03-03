<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Office extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Office');
        $this->load->admin_render('office/index', $data, '');
    } //End function
}//End Class