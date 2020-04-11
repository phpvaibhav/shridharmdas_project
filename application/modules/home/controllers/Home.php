<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Common_Front_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        //$this->check_user_session();
    }//End Function

    public function index() { 
        $data['title'] = 'Home';
        $this->load->front_render('home',$data);
    }//End Function
    public function aboutus() { 
        $data['title'] = 'About us';
        $this->load->front_render('aboutus',$data);
    }//End Function

    public function contact() { 
        $data['title'] = 'Contact us';
        $this->load->front_render('contactus',$data);
    }//End Function
    public function user_step_1() { 
        $userId = (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) ? $_SESSION['userId'] :0;
        $userStep = (isset($_SESSION['userStep']) && !empty($_SESSION['userStep'])) ? $_SESSION['userStep'] :0;
        switch ($userStep) {
            case 2:
              redirect('user-step-2');
                break;
            case 3:
               redirect('user-step-3');
                break;
            
            default:
                # code...
                break;
        }
        $this->load->helper('country_code_helper');
        $data['title'] = 'User Form';
        $data['countryCodes'] = countryCodelist();
     //   pr($data['countryCodes']);
        $data['front_styles'] = array();
         $data['front_scripts'] = array('frontend_assets/js/front_user.js');
        $this->load->front_render_minimal('userform/step_1',$data);
    }//End Function
    public function user_step_2() { 
       // pr($_SESSION);
        $userId = (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) ? $_SESSION['userId'] :0;
        $userStep = (isset($_SESSION['userStep']) && !empty($_SESSION['userStep'])) ? $_SESSION['userStep'] :0;
        switch ($userStep) {
            case 0:
              redirect('user-step-1');
                break;
            case 3:
               redirect('user-step-3');
                break;
            
            default:
                # code...
                break;
        }
        $this->load->helper('country_code_helper');
        $data['title'] = 'User Form';
        $data['front_styles'] = array();
         $data['front_scripts'] = array('frontend_assets/js/front_user.js');
                   $countries      = $this->common_model->getAll('countries');
        $data['countries'] = $countries;
        $data['unionList'] = unionList();
        $data['userId'] = $userId;
        $this->load->front_render_minimal('userform/step_2',$data);
    }//End Function

    public function user_step_3() { 
      //  pr($_SESSION);
        $userId = (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) ? $_SESSION['userId'] :0;
        $userStep = (isset($_SESSION['userStep']) && !empty($_SESSION['userStep'])) ? $_SESSION['userStep'] :0;
        switch ($userStep) {
        case 0:
        redirect('user-step-1');
        break;
        case 2:
        redirect('user-step-2');
        break;

        default:
        # code...
        break;
        }
        $data['title'] = 'User Form';
        $data['front_styles'] = array();
       $data['front_scripts'] = array('frontend_assets/js/front_user.js');
                   $countries      = $this->common_model->getAll('countries');
        $data['countries'] = $countries;
         $data['userId'] = $userId;
        $this->load->front_render_minimal('userform/step_3',$data);
    }//End Function


    public function addUser() { 
        $data['title'] = lang('Home');
        $data['front_styles'] = array('backend_assets/custom/css/user_custom.css');
        $data['front_scripts'] = array();
         $data['front_scripts'] = array('backend_assets/custom/js/front_user.js');
          $countries      = $this->common_model->getAll('countries');
        $data['countries'] = $countries;
        $this->load->login_render('adduser',$data);
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
    function switchLang($language = "",$url = "") {
        
        $language = ($language != "") ? $language : "english";
        $url = ($url != "") ? decoding($url) : base_url();
        $this->session->set_userdata('site_lang', $language);
        redirect($url);
    }//End Function
    public function pincodeajax()
    {
        $res = array();
        $fileName = base_url().'frontend_assets/updated_pincode_sheet.csv';

        if($this->input->post())
        {
            $search = $this->input->post('pinCode');
            if (($fp = fopen("$fileName", "r")) !== false)
            {
                $status = 1;
                while (($row = fgetcsv($fp)) !== false)
                {
                    if(@$row[2] === $search)
                    {

                        //$res0 .= '<option value="'.$row[0].'">'.$row[0].'</option>';

                        $res1 .= '<option value="'.@$row[1].'">'.@$row[1].'</option>';

                        //$res2 = $row[2];

                        $res3 = @$row[3];

                        $res4 = @$row[4];

                        $res5 = @$row[5];
                    }
                }
                fclose($fp);  
            }else{
                 $status = 0;
                $resx = 'Record Not found.';
            }
        }

        $this->output->set_content_type('application/json')
            ->set_output(json_encode(array("status"=>@$status,"res0"=>@$res0, "res1"=>@$res1, "res2"=>@$res2, "res3"=>@$res3, "res4"=>@$res4, "res5"=>@$res5, "resx"=>@$resx)));
    }
}//End Class