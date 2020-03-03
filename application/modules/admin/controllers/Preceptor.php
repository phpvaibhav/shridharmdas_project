<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Preceptor extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Preceptor');
        $this->load->admin_render('preceptor/index', $data, '');
    } //End function
}//End Class