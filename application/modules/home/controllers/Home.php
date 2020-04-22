<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Common_Front_Controller {

    public $data = "";

public function __construct()
    {
        parent::__construct();

        error_reporting(0);
        $this->load->helper(array('form', 'url'));
    }

    public function index() { 
        $data['title'] = 'Home';
        $this->load->front_render('home',$data);
    }//End Function
    public function aboutus() { 
        $data['title'] = 'About us';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('aboutus',$data);
    }//End Function

    public function pad_adhikari() { 
        $data['title'] = 'Pad Adhikari';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('pad_adhikari',$data);
    }//End Function
    

    public function contact() { 
        $data['title'] = 'Contact us';
        $this->load->front_render('contactus',$data);
    }//End Function
    public function motto_of_sdhp() { 
        $data['title'] = 'Motto of SDHP';
        $this->load->front_render('motto_of_sdhp',$data);
    }//End Function
    public function gallery() { 
        $data['title']          = 'Gallery';
        $data['front_styles']   = array('frontend_assets/lightGallery/dist/css/lightgallery.css');
        $data['front_scripts']  = array('https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js','frontend_assets/lightGallery/dist/js/lightgallery-all.min.js','frontend_assets/lightGallery/lib/jquery.mousewheel.min.js','frontend_assets/lightGallery/dist/js/gallery.js');
        $this->load->front_render('gallery',$data);
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

         $data['userId'] = $userId;
        $this->load->front_render_minimal('userform/step_3',$data);
    }//End Function

    public function user_preview() { 
      //  pr($_SESSION);
/*        $userId = (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) ? $_SESSION['userId'] :0;
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
        }*/
        $data['title'] = 'User Preview';
        $data['front_styles'] = array();
      // $data['front_scripts'] = array('frontend_assets/js/front_user.js');

         $data['userId'] = $userId;
        $this->load->front_render_minimal('userform/user_preview',$data);
    }//End Function
    


    public function addUser() { 
        $data['title'] = lang('Home');
        $data['front_styles'] = array('backend_assets/custom/css/user_custom.css');
        $data['front_scripts'] = array();
         $data['front_scripts'] = array('backend_assets/custom/js/front_user.js');

        $this->load->login_render('adduser',$data);
    }//End Function 

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
                while (($row = fgetcsv($fp)) !== false)
                {
                    if($row[2] === $search)
                    {

                        //$res0 .= '<option value="'.$row[0].'">'.$row[0].'</option>';

                        $res1 .= '<option value="'.$row[1].'">'.$row[1].'</option>';

                        //$res2 = $row[2];

                        $res3 = $row[3];

                        $res4 = $row[4];

                        $res5 = $row[5];
                         $status = 1;
                    }
                }
                fclose($fp);  
            }
            else
            {
                $status = 0;
                $resx = 'Record Not found.';
            }
        }
     
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(array("status"=>$status,"res1"=>$res1, "res3"=>$res3, "res4"=>$res4, "res5"=>$res5 )));
    }
}//End Class