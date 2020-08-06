<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Api extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
  
        $this->load->model('api_model'); //load image model
    }

    // For Registration 
    function login_number_post(){
        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
        $this->form_validation->set_rules('countrycode','country code','trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $contactNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
            $countrycode            = trim(str_replace(array('(',')','+',' '),array('','','',''),$this->post('countrycode')));
            $contactNumber          = $countrycode.$contactNumber;
            $this->load->library('sms_sent');
            $response               = $this->sms_sent->sent_otp_number($contactNumber);  

            // $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));   
            //} 
        }
        $this->response($response);
    }// For Registration 
    
    function verifyOtpCode_post(){
        $this->form_validation->set_rules('countrycode','contact code','trim|required');
        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
        $this->form_validation->set_rules('otpnumber','otpnumber','trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $contactNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
            $countrycode          = trim(str_replace(array('(',')','+',' '),array('','','',''),$this->post('countrycode')));
            $contactNumberA = $contactNumber;
            $contactNumber = $countrycode.$contactNumber;

            $otpnumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('otpnumber')));
            $this->load->library('sms_sent');
            $response           = $this->sms_sent->verify_otp_code($contactNumber,$otpnumber); 
            if($response['status']=='success'){
                $where =array('contactNumber'=>$contactNumberA);
                $response['users'] = $this->common_model->getAll('users', $where,'','','id as userId,username,fullName,contactNumber');
            }
            
        }
        $this->response($response);
    } //End Function

    function smsSentReOtp_post(){

        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $contactNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
            $countrycode          = trim(str_replace(array('(',')','+',' '),array('','','',''),$this->post('countrycode')));
            $contactNumber = $countrycode.$contactNumber;
            $this->load->library('sms_sent');

            $response           = $this->sms_sent->sent_otp_retry_number($contactNumber); 
               // $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));   
            //}   
        }
        $this->response($response);
    } //End Function
    function registration_post(){
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
            array('is_unique' => 'Email already exist')
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('fullName', 'full Name', 'trim|required|min_length[2]');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        else{

            $email                          = $this->post('email');
            $fullName                       = $this->post('fullName');
            $authtoken                      = $this->api_model->generate_token();
            $passToken                      = $this->api_model->generate_token();
            //user info
            $userData['fullName']           =   $fullName;
            $userData['email']              =   $email;
            $userData['userType']           =   2;
            $userData['contactNumber']      =   $this->post('contact');
            $userData['authToken']          =   $authtoken;
            $userData['password']           =   password_hash($this->post('password'), PASSWORD_DEFAULT);
            $userData['authToken']          =   $authtoken;
            $userData['passToken']          =   $passToken;

            //user info
            // profile pic upload
            $this->load->model('Image_model');
          
            $image = array(); $profileImage = '';
            if (!empty($_FILES['profileImage']['name'])) {
                $folder     = 'users';
                $image      = $this->Image_model->upload_image('profileImage',$folder); //upload media of Seller
                
                //check for error
                if(array_key_exists("error",$image) && !empty($image['error'])){
                    $response = array('status' => FAIL, 'message' => strip_tags($image['error'].'(In user Image)'));
                    $this->response($response);
                }
                //check for image name if present
                if(array_key_exists("image_name",$image)):
                    $profileImage = $image['image_name'];
                endif;
            
            }
            $userData['profileImage']       =   $profileImage;
            $result = $this->api_model->registration($userData);
            if(is_array($result)){

               switch ($result['regType']){
                    case "NR": // Normal registration
                    $this->StoreSession($result['returnData']);
                    //send mail
                        $maildata['title']    = $result['returnData']->fullName." been invited to join Interface service";
                        $maildata['message']  = "<table><tr><td>Name</td><td>".$result['returnData']->fullName."</td></tr><tr><td>Email</td><td>".$result['returnData']->email."</td></tr></table>";
                        $subject    = "Create customer";
                        $message    = $this->load->view('emails/email',$maildata,TRUE);
                        $emails     = $this->common_model->adminEmails();
                        if(!empty($emails)){
                       // $this->load->library('smtp_email');
                       // $this->smtp_email->send_mail_multiple($emails,$subject,$message);
                        }
                    //send mail
                    $response = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(110), 'messageCode'=>'normal_reg','users'=>$result['returnData']);
                    break;
                    case "AE": // User already registered
                    $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(117),'users'=>array());
                    break;
                    default:
                    $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(121),'userDetail'=>array());
                }
             }else{
                $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118),'userDetail'=>array());
            }   
            $this->response($response);
        }
    } //End Function
    function loginwithUser_post(){
        $this->form_validation->set_rules('username','user name','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        else
        {
            $authtoken              = $this->api_model->generate_token();
            $data                   = array();
            $data['username']          = $this->post('username');
            $data['password']       = $this->post('password');
            $data['deviceType']     = $this->post('deviceType');
            $data['deviceToken']    = $this->post('deviceToken');
            $data['authToken']      = $authtoken;
            $result                 = $this->api_model->login($data,$authtoken);
            if(is_array($result)){
                switch ($result['returnType']) {
                    case "SL":
                     
                    $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106), 'users' => $result['userInfo']);
                    break;
                    case "WP":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(102));
                    break;
                    case "WE":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(126));
                    break;
                    case "IU":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));
                    break;
                    case "WS":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));
                    break;
                    default:
                    $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106), 'users' => $result['userInfo']);
                }
            }
            else{
                $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(126));
            }    
            $this->response($response);
        }
    } //End Function

    function login_post(){
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        else
        {
            $authtoken              = $this->api_model->generate_token();
            $data                   = array();
            $data['email']          = $this->post('email');
            $data['password']       = $this->post('password');
            $data['deviceType']     = $this->post('deviceType');
            $data['deviceToken']    = $this->post('deviceToken');
            $data['authToken']      = $authtoken;
            $result                 = $this->api_model->login($data,$authtoken);
            if(is_array($result)){
                switch ($result['returnType']) {
                    case "SL":
                     
                    $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106), 'users' => $result['userInfo']);
                    break;
                    case "WP":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(102));
                    break;
                    case "WE":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(126));
                    break;
                    case "IU":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));
                    break;
                    case "WS":
                    $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));
                    break;
                    default:
                    $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106), 'users' => $result['userInfo']);
                }
            }
            else{
                $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(126));
            }    
            $this->response($response);
        }
    } //End Function

    
    //user forgot password
    function forgotPassword_post(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        $email      = $this->post('email');
        $response   = $this->api_model->forgotPassword($email);
        if($response['emailType'] == 'ES'){ //ES emailSend
            $response = array('status' => SUCCESS, 'message' => 'Please check your mail to reset your password.');
        }elseif($response['emailType'] == 'NS'){ //NS NotSend
            $response = array('status' => FAIL, 'message' => 'Error not able to send email');
        }
        elseif($response['emailType'] == 'NE'){ //NE Not exist
            $response = array('status' => FAIL, 'message' => 'This Email does not exist'); 
        }elseif($response['emailType'] == 'SL'){ //SL social login
            $response = array('status' => FAIL, 'message' => 'Social registered users are not allowed to access Forgot password'); 
        }
        $this->response($response);
    } //End function
     function sent_password_post(){
        $this->form_validation->set_rules('userId', 'userid', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        $userId      = $this->post('userId');
        $where = array('id'=>$userId);
        $user = $this->common_model->is_data_exists('users',$where);
        if($user){
            //pr($user);
             $contactNumber = $user->contactNumber;

          $msg          = "Hello,".$user->fullName.",Shree Dharmdas project activation successfully./n Username : ".$user->username." and Password : 123!@# ";
          if($user->activePassword==0){
                $this->load->library('sms_sent');
                $response           = $this->sms_sent->normal_msg($contactNumber,$msg); 
            
          }else{
            $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(130)); 
          }
         
        }else{
           $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118)); 

        }
        
        $this->response($response);
    } //End function
    public function zipcode_to_address_post(){
        $this->form_validation->set_rules('zip_code', 'zip code', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }else{
            $zip_code =$this->post('zip_code');
            $res = array();
            $fileName = 'frontend_assets/updated_pincode_sheet.csv';
             if (($fp = fopen("$fileName", "r")) !== false)
            {
                while (($row = fgetcsv($fp)) !== false)
                {
                    if($row[2] === $zip_code)
                    {

                        //$res0 .= '<option value="'.$row[0].'">'.$row[0].'</option>';

                       // $res1 .= '<option value="'.$row[1].'">'.$row[1].'</option>';
                        $res1 .= $row[1].'|';

                        //$res2 = $row[2];

                        $res3 = $row[3];

                        $res4 = $row[4];

                        $res5 = $row[5];
                         $status = 1;
                    }
                }
                fclose($fp);  
            }else{
              $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));   
            }

            $postName = array_filter(explode("|",$res1));
            $result = array("postName"=>$postName, "tehsil"=>$res3,"city"=>$res3, "district"=>$res4, "state"=>$res5 , "country"=>'India'); 
            $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$result); 
        }
        $this->response($response);
    }//End function
    
    public function sangh_list_get()
    {

        $unionList          =  $this->common_model->getAll('shree_sangh',array('status'=>1),'name','ASC');
        if($unionList){
            
            $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$unionList);
        }else{
            $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
        }
       
       $this->response($response);
    }//End Function

    public function pachkan_list_get()
    {
        $select = 'pachkanId,name,description,
                        (case when (file = "") 
                        THEN "" ELSE
                        concat("'.base_url().'uploads/pachkan/",file) 
                        END) as audioFile';
        $pachkan_list          =  $this->common_model->getAll('pachkan',array('status'=>1),'pachkanId','DESC',$select);
        if($pachkan_list){
              
            $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$pachkan_list);
        }else{
            $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
        }
       
       $this->response($response);
    }//End Function
    
    
    public function sant_list_get()
    {
        $select = 'santId,name';
        $sant_list          =  $this->common_model->getAll('sant_maharaj',array('status'=>1),'santId','DESC',$select);
        if($sant_list){
              
            $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$sant_list);
        }else{
            $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
        }
       
       $this->response($response);
    }//End Function

    
    public function sant_detail_post()
    {
        $this->form_validation->set_rules('santId', 'sant id', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }else{
            $santId = $this->post('santId');
            $sant         =  $this->common_model->is_data_exists('sant_maharaj',array('santId'=>$santId));
            if($sant){
                $where_s = "santId IN (".(!empty($sant->shishya)?$sant->shishya:0).")";
                $sant->shishyaList           = $this->common_model->getAll('sant_maharaj',$where_s,'santId','DESC','santId,name');
                $sant->contactList =  $this->common_model->getAll('sant_maharaj_contact',array('santId'=>$santId));
                $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$sant);
            }else{
                $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
            }
       }
       $this->response($response);
    }//End Function      

    public function donation_chance_list_get()
    {
        $select = 'typeId,name';
        $list          =  $this->common_model->getAll('donationtype',array('donationType'=>'BY','status'=>1));
        if($list){
              
            $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$list);
        }else{
            $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
        }
       
       $this->response($response);
    }//End Function

    
    public function donation_feed_list_get()
    {
        $this->load->model('adminapi/donation_model');
        $this->donation_model->set_data();
        $list = $this->donation_model->get_list();
        if($list){
              
            $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$list);
        }else{
            $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
        }
       
       $this->response($response);
    }//End Function
    

    
}//End Class 