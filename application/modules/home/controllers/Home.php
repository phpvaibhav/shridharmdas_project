<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Common_Front_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        //$this->check_user_session();
    }//End Function

    public function index() { 
        $data['title'] = "Home";
        $data['front_styles'] = array();
        $data['front_scripts'] = array();
         $data['front_scripts'] = array('backend_assets/custom/js/front_user.js');
          $countries      = $this->common_model->getAll('countries');
        $data['countries'] = $countries;
        $this->load->login_render('home',$data);
    }//End Function 
    function countryToState(){
        $country     = $this->input->post('country');
        $html = "";
        $countrydata      = $this->common_model->getsingle('countries',array('country_name'=>$country));
        $states      = $this->common_model->getAll('states',array('country_id'=>$countrydata['country_id']));
     
       
        if(!empty($states)):
            $html .= '<option value="0" selected="" disabled="">Select State</option>';
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