<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Users');
        $this->load->admin_render('users/index', $data, '');
    } //End function
}//End Class