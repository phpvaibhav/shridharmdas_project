<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
      //  $this->load->model('admin_model');
    }//End Function
    public function index() { 
        $data['title'] = lang('sign_in');
        $this->load->login_render('login', $data);
    }//End Function
    public function signup() { 
        $data['title'] = "Sign up";
        $this->load->login_render('signup', $data);
    }//End Function
    public function forgot() { 
        $data['title'] = lang('forgot_password');
        $this->load->login_render('forgot', $data);
    }//End Function
    public function logout() {
        $this->admin_logout(FALSE);
        $this->session->set_flashdata('success', 'Sign out successfully done! ');
        $response = array('status' => 1);
        redirect(base_url());
        echo json_encode($response);
        die;
    }//End Function
    public function dashboard() {
        $data['parent']     = lang("Dashboard");
        $data['title']      = lang("Dashboard");
        $sanghId=$_SESSION[ADMIN_USER_SESS_KEY]['sanghId'];
         $where = "";
        if(!empty($sanghId)){
            $where = array('sanghId'=>$sanghId);
        }
        $data['users']      = $this->common_model->get_total_count('users',$where);
    /*    $data['preceptor']  = $this->common_model->get_total_count('preceptor');
        $data['union']      = $this->common_model->get_total_count('union_group');
        $data['office']     = $this->common_model->get_total_count('offices');*/
        $this->load->admin_render('dashboard', $data, '');
    }//End Function
    function switchLang($language = "",$url = "") {
        
        $language = ($language != "") ? $language : "english";
        $url = ($url != "") ? decoding($url) : base_url();
        $this->session->set_userdata('site_lang', $language);
        redirect($url);
    }//End Function
   
}//End Class