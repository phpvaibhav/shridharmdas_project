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
        $data['users']      = $this->common_model->get_total_count('users');
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
    function countryToState(){
        $country     = $this->input->post('country');
        $html = "";
        $countrydata      = $this->common_model->getsingle('countries',array('country_name'=>$country));
        $states      = $this->common_model->getAll('states',array('country_id'=>$countrydata['country_id']));
     
       
        if(!empty($states)):
                $html .= '<option value="0" selected="" disabled="">'.lang('State').'</option>';
            foreach ($states as $k => $state) {
                $html .= '<option value="'.$state->state_name.'">'.$state->state_name.'</option>';
            }
        else : 
               $html .= '<option value="">State not available</option>';
        endif;
        echo $html;

    }//End function  
    function stateToCity(){
        $state     = $this->input->post('state');
        $html = "";
        $statedata      = $this->common_model->getsingle('states',array('state_name'=>$state));
        $cities      = $this->common_model->getAll('cities',array('state_id'=>$statedata['state_id']));
     
       
        if(!empty($cities)):
            $html .= '<option value="0" selected="" disabled="">Select City</option>';
            foreach ($cities as $k => $city) {
                $html .= '<option value="'.$city->city_name.'">'.$city->city_name.'</option>';
            }
        else : 
               $html .= '<option value="">City not available</option>';
        endif;
        echo $html;

    }//End function
}//End Class