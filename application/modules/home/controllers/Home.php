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
          $data['front_styles']   = array('frontend_assets/css/about.css');
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

    public function jeevani() { 
        $data['title'] = 'Jeevani';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('jeevani',$data);
    }//End Function
    public function jeevani_parichay() { 
        $data['title'] = 'Jeevani';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('jeevani_parichay',$data);
    }//End Function
    
    public function vidhan() { 
        $data['title'] = 'Vidhan';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('vidhan',$data);
    }//End Function

    
    
    public function vrksh() { 
        $data['title'] = 'Vrksh';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('vrksh',$data);
    }//End Function
    
    
    
    public function moto() { 
        $data['title'] = 'Moto';
         $data['front_styles']   = array('frontend_assets/css/about.css');
        $this->load->front_render('moto',$data);
    }//End Function
    
    
    

    public function contact() { 
        $data['title'] = 'Contact us';
        $data['front_styles'] = array();
        $data['front_scripts'] = array('frontend_assets/js/contactus.js');
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
    
    public function user_from() { 
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
          $data['unionList'] = $this->common_model->getAll('shree_sangh',array('status'=>1),'sanghId','ASC'); //unionList();
         $data['front_scripts'] = array('frontend_assets/js/user_form.js');
        $this->load->front_render_minimal('userform/step_1',$data);
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
          $data['unionList'] = $this->common_model->getAll('shree_sangh',array('status'=>1),'sanghId','ASC'); //unionList();
         $data['front_scripts'] = array('frontend_assets/js/user_form.js');
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
      
        $data['title'] = 'User Form';
        $data['front_styles'] = array();
        $data['front_scripts'] = array('frontend_assets/js/front_user.js');
       // $this->load->helper('country_code_helper');
        $data['unionList'] = $this->common_model->getAll('shree_sangh',array('status'=>1),'sanghId','ASC'); //unionList();
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

       // pr($_POST);
        $res = array();

        $fileName = 'frontend_assets/updated_pincode_sheet.csv';

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
    public function contactus_submit(){
        if($_POST) {
    $visitor_name               = "";
    $visitor_email              = "";
    $email_title                = "";
    $concerned_department       = "";
    $visitor_message            = "";
     
    if(isset($_POST['fullName'])) {
        $visitor_name = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
   /* if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }*/
    $email_title = "Contact us support";
   /* if(isset($_POST['concerned_department'])) {
        $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
    }*/
     
    if(isset($_POST['message'])) {
        $visitor_message = htmlspecialchars($_POST['message']);
    }
     
/*    if($concerned_department == "billing") {
        $recipient = "billing@domain.com";
    }
    else if($concerned_department == "marketing") {
        $recipient = "marketing@domain.com";
    }
    else if($concerned_department == "technical support") {
        $recipient = "tech.support@domain.com";
    }
    else {
        $recipient = "dharmadasjanganna2020@gmail.com";
    }*/
    $recipient = "vaibhavsharma.otc@gmail.com"; 
    switch (ENVIRONMENT)
    {
    case 'production':
    $recipient = "dharmadasjanganna2020@gmail.com"; 
    break;

    default:
    $recipient = "vaibhavsharma.otc@gmail.com"; 
    }

    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        $status = 'success';
        $message = 'Thank you for contacting us, '.$visitor_name.'. You will get a reply within 24 hours.';
      
    } else {
      
        $status = 0;
        $message = 'We are sorry but the email did not go through.';
    }
     
} else {
      $status = 0;
        $message = 'Something went wrong';
    
}
 $this->output->set_content_type('application/json')
            ->set_output(json_encode(array("status"=>$status,"message"=>$message)));
    }//End Function
}//End Class