<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Common controller for admin modules
* version: 2.0 (14-08-2018)
*/
require APPPATH . "third_party/MX/Controller.php";  //include MX library (HMVC library)
class Common_Back_Controller extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->admin_user_session_key = ADMIN_USER_SESS_KEY; //user session key
        $this->tbl_users = ADMIN; //admin table
       
                $language_array = array('english','hindi');//language array
        $this->appLang = 'hindi'; //set default langauge
        $siteLang = $this->session->userdata('site_lang');
        if ($siteLang) {
           $this->appLang= $siteLang;
        } else {
            $this->session->set_userdata('site_lang',$this->appLang);
        }
        $header = $this->input->request_headers();//get header values
        $lang_key = '';//set key
        //check for language key exist in header array or not
        if(array_key_exists ( 'language' , $header )){
            $lang_key = 'language';
        } elseif(array_key_exists ( 'Language' , $header )){
            $lang_key = 'Language';
        }

        if(!empty($lang_key)){//if language key not empty get language from header

            $lang_val = $header[$lang_key];//get header language 

            if(in_array($lang_val,$language_array )){//check if header langauge in array set in varaible
                $this->appLang = $lang_val;
            }
        }

        if($this->appLang == 'hindi'){
            $this->config->set_item('language', $this->appLang);
        }
           $this->lang->load('login_signup_message_lang', $this->appLang);
       
        $this->lang->load('response_messages_lang', $this->appLang); 
        $this->lang->load('common_msg_lang', $this->appLang);
        $this->lang->load('front_site_message_lang', $this->appLang);
    }
    /**
     * Admin session authentication for pages
     * Added in ver 2.0
     */
    public function check_admin_user_session(){
        $page_slug          = $this->router->fetch_method();
        $allowed_pages      = array('signup','index','forgot'); //these pages/methods do not require user authentication
        $allowed_control    = 'admin'; //methods of this controller does not require authentication
        $current_control    = $this->router->fetch_class(); // get current controller, class = controller
      // pr(is_admin_logged_in());
        if(!is_admin_logged_in() && (in_array($page_slug,$allowed_pages)) && $current_control == $allowed_control){ 
            return TRUE; //session is empty and pages is not restricted
        }else{
            //either page is resticted or session exist
            if(!is_admin_logged_in()){
                redirect(''); //redirect to home/login if session not exit
            }
            //user session exists
            $user_sess_data = $_SESSION[ $this->admin_user_session_key ]; //user session array
            $session_u_id   = $user_sess_data['id']; //user ID
            $where          = array('id'=>$session_u_id,'status'=>1); //status:0 means active 
            $check          = $this->common_model->is_data_exists($this->tbl_users,$where);
            if($check === FALSE){
               //user is either deleted or is inactivated
               $this->logout(); //force logout
            }
            if(empty($page_slug)){
               return TRUE; //if slug is empty and session is set
            }
           // pr($page_slug);
            $after_auth = array('signup','index','forgot'); //restrict access to these pages if session is set
            if(in_array($page_slug,$after_auth) && $current_control == $allowed_control){
                redirect('dashboard');
            }else{
                return TRUE; 
            }   
        } 
    }//End function
    /**
     * Admin user logout
     * Added in ver 2.0
     */
    function admin_logout($is_redirect=TRUE){
        // instead of destroying whole session data, we will just unset biz user session data
        unset($_SESSION[$this->admin_user_session_key]); 
        if($is_redirect)
            redirect('admin');  //redirect only when $is_redirect is set to TRUE
    }//End function
    /**
     * Admin authentication for ajax
     * Added in ver 2.0
     */
    public function check_admin_ajax_auth(){
        //verify if request is xhr(ajax)
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $failed_res = json_encode(array('status'=> -1,'msg'=>'Your session expired. Please login again.','url'=>base_url('admin')));
        if(!is_admin_logged_in()){
            echo $failed_res; exit;
        }
        //user session exists
        $user_data  = get_admin_session_data();
        $where      = array('id'=>$user_data['id'],'status'=>0); //status:0 means active 
        $check      = $this->common_model->is_data_exists($this->tbl_users,$where);
        if($check===FALSE){
           //user is either deleted or is inactivated
           $this->logout(FALSE); //force logout- $is_redirect is FALSE here because we will redirect user from JS
           echo $failed_res; exit;
        }
        return TRUE; //all good
    }//End function
}//End Class