<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Webapi extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dataTableModel');
		$this->load->model('CoreModel');
		$this->load->helper(array('form', 'url'));
		$this->load->library('s3');
		$this->load->library('mandrill');
    }
    function teacherLogin_post(){
        $this->form_validation->set_rules('t_username','user name','trim|required');
        $this->form_validation->set_rules('t_password','password','trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        else
        {
            
            $data           = array();
            $username       = $this->post('t_username');
            $userType  		= ($username=='admin') ? 4:1;
            $password       = $this->post('t_password');
            $result 		= $this->CoreModel->read('users',array('userName'=>$username,'password'=>$password,'userType'=>$userType),"id,userName,schoolId,email,firstName,lastName,userType,signup_status,profilePic,status,activated" );
            if($result){
                //check Status and Active teacher  start
                if(($result[0]['status']==1) && ($result[0]['activated']==1)) 
                {
                    /*check user type*/
                    if($result[0]['userType']==4)
                    {
                        $this->session->set_userdata('userType_PP', 'ADMIN');
                        $this->session->set_userdata('userId_PP', $result[0]['id']);
                        $this->session->set_userdata('userPic_PP', $result[0]['profilePic']);
                        $this->session->set_userdata('userFname_PP', $result[0]['firstName']);
                        $this->session->set_userdata('userLname_PP', $result[0]['lastName']);
                        $this->session->set_userdata('signup_status_PP', $result[0]['signup_status']);
                        $page = ($result[0]['signup_status']==1) ? "dashboard" :"dashboard";
                       // $res = array('info'=>$result,'page'=>"dashboard");
                        $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106),'page'=>$page);
                    }
                    else if($result[0]['userType']==1)
                    {
                        $memVel = $this->CoreModel->read('membership_validity',array('userId'=>$result[0]['id'], 'expiredOn >=' => time()),"id,expiredOn,isRecurring" );
                        if(empty($memVel))
                        {
                            $this->session->set_userdata('userType_PP', 'TEACHER');
                            $this->session->set_userdata('userId_PP', $result[0]['id']);
                            $this->session->set_userdata('email_PP', $result[0]['email']);
                            $this->session->set_userdata('userPic_PP', $result[0]['profilePic']);
                            $this->session->set_userdata('userUname_PP', $result[0]['userName']);
                            $this->session->set_userdata('userFname_PP', $result[0]['firstName']);
                            $this->session->set_userdata('userLname_PP', $result[0]['lastName']);
                            $this->session->set_userdata('status_PP', $result[0]['status']);
                            $this->session->set_userdata('signup_status_PP', $result[0]['signup_status']);

                            $this->session->set_flashdata('flashMsg', 'Your membership is expired, Please Upgrade.');
                           // $res = array('info'=>$result,'page'=>"pricing");
                            $page = ($result[0]['signup_status']==1) ? "pricing" :"teacher-profile";
                            $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106),'page'=>$page);
                        }
                        else
                        {
                            /* onBoarding Notifications */
                            $messages = $this->CoreModel->read('onBoardingNotifications',array('userId'=>$result[0]['id']),"id,msgType,message" );
                            
                            if($messages[0]['id']!='')
                            {
                                $time = time();
                                $oneHour = $time+(60*60);
                                $this->CoreModel->update('onBoardingNotifications',array('msgType'=>1,'message'=>'this is first message for Invite student','updatedAt'=>$time),array('userId'=>$result[0]['id'] ) );
                            }
                            else
                            {
                                $time = time();
                                $oneHour = $time+(60*60);
                            $this->CoreModel->create('onBoardingNotifications',array('userId'=>$result[0]['id'],'msgType'=>1,'message'=>'this is first message for Invite student','sendingTime'=>$oneHour,'createdAt'=>$time ) );
                            }                   
                          /* End onBoarding Notifications */
                          
                            $this->session->set_userdata('userType_PP', 'TEACHER');
                            $this->session->set_userdata('userId_PP', $result[0]['id']);
                            $this->session->set_userdata('email_PP', $result[0]['email']);
                            $this->session->set_userdata('userPic_PP', $result[0]['profilePic']);
                            $this->session->set_userdata('userUname_PP', $result[0]['userName']);
                            $this->session->set_userdata('userFname_PP', $result[0]['firstName']);
                            $this->session->set_userdata('userLname_PP', $result[0]['lastName']);
                            $this->session->set_userdata('status_PP', $result[0]['status']);
                             $this->session->set_userdata('signup_status_PP', $result[0]['signup_status']);
                            $page = ($result[0]['signup_status']==1) ? "dashboard2" :"teacher-profile";
                            $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106),'page'=>$page);
                        }
                    }
                    /*check user type*/
                }else{
                     $response = array('status' => FAIL, 'message' =>'Your account is inactive. contact your administrator to activate it.');   
                }
                //check Status and Active teacher  end
            }else{

                $response = array('status' => FAIL, 'message' =>'Enter valid username and password.');  
            }  
            $this->response($response);
        }
    } //End Function
    function schoolLogin_post(){
        $this->form_validation->set_rules('s_username','user name','trim|required');
        $this->form_validation->set_rules('s_password','password','trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }
        else
        {
            
            $data           = array();
            $username       = $this->post('s_username');
            
            $password       = $this->post('s_password');
            $result = $this->CoreModel->read('school',array('userName'=>$username,'password'=>$password),"id,userName,schoolName,schoolAddress,contactPersonName,schoolEmail,activated,image,status");
            if(!empty($result)){
                //check Status and Active teacher  start
                //pr($result);
                if($result[0]['activated']==1 && $result[0]['status']==1)
                {
                    $this->session->set_userdata('userType_PP', 'SCHOOL');
                    $this->session->set_userdata('schoolId_PP', $result[0]['id']);
                    $this->session->set_userdata('userName_PP', $result[0]['userName']);
                    $this->session->set_userdata('schoolName_PP', $result[0]['schoolName']);
                    $this->session->set_userdata('schoolImage_PP', $result[0]['image']);

                      $response = array('status' => SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(106),'page'=>'dashboard3'); 
                }else{
                     $response = array('status' => FAIL, 'message' =>'Your account is inactive. contact your administrator to activate it.');   
                }
                //check Status and Active teacher  end
            }else{

                $response = array('status' => FAIL, 'message' =>'Enter valid username and password.');  
            }  
            $this->response($response);
        }
    } //End Function
    //techer forgot password
    function teacherForgot_post(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }else{
            $username       = $this->post('username');
            $result = $this->CoreModel->read('users',array('userName'=>$username),'id,email,userName,activated,status');

            if(!empty($result) )
            {
                if($result[0]['activated']==0)
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Your account activation is pending.','page'=>'');
                }
                else if($result[0]['status']==0)
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Your account is deactivated.','page'=>'');
                }
                else
                {
                   
                    $response       = array('status' => SUCCESS, 'message' => 'Please check your email, to update your password.','page'=>'');
                    $this->emailForPasswordRequest($result[0]['email'],$result[0]['userName'],$result[0]['id']);

                }
            }else{
                $response = array('status' => FAIL, 'message' =>'User name does not exist.');
            }
           
        }
        $this->response($response);
    } //End function
   //schoo; forgot password
    function schoolForgot_post(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }else{
            $email       = $this->post('email');
            $result = $this->CoreModel->read('school',array('schoolEmail'=>$email),'id,schoolEmail,userName,activated,status');

            if(!empty($result) )
            {
                /*send mail*/
                if($result[0]['activated']==0)
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Your account activation is pending.','page'=>'');
                }
                else if($result[0]['status']==0)
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Your account is deactivated.','page'=>'');
                }
                else
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Please check your email, to update your password.','page'=>'');

                    $this->emailForPasswordRequestSchool($result[0]['schoolEmail'],$result[0]['userName'],$result[0]['id']);
                }
                /*send mail*/
            }else{
                $response = array('status' => FAIL, 'message' =>'Email does not exist.');
            }
        }
        $this->response($response);
    } //End function
    public function emailForPasswordRequest($email,$uname,$id)
    {
        $this->load->library('enc');

        $encryptedPara = $this->enc->doEncrypt($id);
        $activationURL = base_url().'teacher-password?code='.$encryptedPara;

        $to_email = $email;
        $mailData = array('activationURL'=>$activationURL, 'uname'=>$uname);
        $this->load->library('emaillib');
        $this->emaillib->sendEmails('emailForPasswordRequestTmpl',$mailData,'We received a request to change your password',$to_email,'');
        return true;
    } //End function
    public function emailForPasswordRequestSchool($email,$uname,$id)
    {
        $this->load->library('enc');
        $encryptedPara = $this->enc->doEncrypt($id);
        $activationURL = base_url().'school-password?code='.$encryptedPara;

        $to_email = $email; 
        $mailData = array('activationURL'=> $activationURL);
                
        $this->load->library('emaillib');
        $this->emaillib->sendEmails('emailForPasswordRequestTmpl',$mailData,'We received a request to change your password',$to_email,'');
         return true;
    }//End function
    function resetPasswordTeacher_post(){
        $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[6]',array('min_length' => 'Password should have minimum 6 character.'));
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]',array('matches' => 'Confirm password does not match.'));
        
        if ($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }else{
            $password = $this->post('password');
            $userId = decoding($this->post('user_id'));
            /*check*/
            $udata = $this->CoreModel->read('users',array('id'=>$userId,'activated'=>1,'status'=>1), 'id,userName,firstName,lastName,email,userType');

            if(!empty($udata))
            {

                if($this->CoreModel->update('users',array('password'=>$password,'updatedAt'=>time()), array('id'=>$userId)))
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Your password is updated successfully. please login with your new password.','page'=>'success-password');
                    $to_email = $udata[0]['email']; 
                    $mailData = array('uname'=>$udata[0]['userName']);
                    $this->load->library('emaillib');
                    $this->emaillib->sendEmails('emailForPasswordUpdateTmpl',$mailData,'Your password has been updated',$to_email,'');
                }else{
                    $response = array('status' => FAIL, 'message' =>'Could not update your password, contact support or admin.');
                }
            }else{
                $response = array('status' => FAIL, 'message' =>'Something going wrong,please contact support or admin.');
            }
            /*check*/
        }
        $this->response($response);
    }//end function
    function resetPasswordSchool_post(){
        $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[6]',array('min_length' => 'Password should have minimum 6 character.'));
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]',array('matches' => 'Confirm password does not match.'));
        
        if ($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }else{
            $password = $this->post('password');
            $userId = decoding($this->post('user_id'));
            /*check*/
            $udata = $this->CoreModel->read('school',array('id'=>$userId,'activated'=>1,'status'=>1), 'id,userName,schoolName,schoolEmail,userType');

            if(!empty($udata))
            {
                if($this->CoreModel->update('school',array('password'=>$password,'updatedAt'=>time()), array('id'=>$userId)))
                {
                    $response       = array('status' => SUCCESS, 'message' => 'Your password is updated successfully. please login with your new password.','page'=>'success-password');
                  
                }else{
                    $response = array('status' => FAIL, 'message' =>'Could not update your password, contact support or admin.');
                }
            }else{
                $response = array('status' => FAIL, 'message' =>'Something going wrong,please contact support or admin.');
            }
            /*check*/
        }
        $this->response($response);
    }//end function 
    function teacherSignUp_post(){
        $this->form_validation->set_rules('t_username','user name','trim|required|is_unique[pp_users.username]',
            array('is_unique' => 'User name already exist'));
        $this->form_validation->set_rules('t_email', 'Email', 'trim|required|valid_email|is_unique[pp_users.email]',
            array('is_unique' => 'Email already exist'));
      $this->form_validation->set_rules('t_password', 'New Password', 'required|trim|min_length[6]',array('min_length' => 'Password should have minimum 6 character.'));
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $signup_status               = 0 ;
            $data_val                    = array();
            $data_val['userName']        = $this->post('t_username'); 
            $data_val['email']           = $this->post('t_email'); 
            $data_val['password']        = $this->post('t_password'); 
            $data_val['userType']        = 1; 
            $data_val['signup_status']   = $signup_status; 
            $data_val['profilePic']      = 'default-user.png'; 
            $data_val['activated']       = 0; 
            $coupon_code                 = $this->post('t_coupon_code');
            $lastId = $this->CoreModel->create('users',$data_val,'id');
            if($lastId){
                $teacherId = $lastId;
                /*Teacher manage*/
                $coupon = array();
                $addTime = '';
                $couponStatus =1;
                if(isset($coupon_code) && !empty($coupon_code)&& $coupon_code!=null){
                    $coupon = $this->CoreModel->read('coupons',"code='".$coupon_code."'", 'id,code,type,userId,expiredOn,benefitOfTimeCount,benefitOfTimeUnit,status');
                    if(!empty($coupon)&& count($coupon) >0 ){
                        if($coupon[0]['expiredOn'] <time())
                            $couponStatus = 0;

                        if($coupon[0]['status'] !=1)
                            $couponStatus = 0;

                        if($coupon[0]['benefitOfTimeUnit'] ==1)
                            $addTime = $coupon[0]['benefitOfTimeCount']*(24*60*60);

                        if($coupon[0]['benefitOfTimeUnit'] ==2)
                            $addTime = $coupon[0]['benefitOfTimeCount']*(24*60*60*30);
                    }else{
                        $couponStatus = 0;
                    }
                }//Coupon check
                $this->CoreModel->create('teacher_settings',array('userId'=>$teacherId) );

                if($addTime !='' && $addTime !=0)
                {
                    $insertTime = time();
                    $studentLimit = 1000;
                    $remainingStudentLimit = 1000;
                    $expiredMem = $insertTime+$addTime;
                }
                else
                {
                    $insertTime = time();
                    $studentLimit = 1000;
                    $remainingStudentLimit = 1000;
                    $expiredMem = $insertTime+(24*60*60*30);
                }
                $this->CoreModel->create('membership_validity',array('userId'=>$teacherId,'createdAt'=>$insertTime,'updatedAt'=>$insertTime,'expiredOn'=>$expiredMem,'studentLimit'=>$studentLimit,'remainingStudentLimit'=>$remainingStudentLimit) );
                                
                    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                    $length = 6;
                    $code = '';
                    
                    for($i = 0; $i < $length; ++$i) {
                       $random = str_shuffle($chars);
                       $code .= $random[0];
                    }

                    $autoCoupSetting = $this->CoreModel->read('auto_coupon_setting',array('id >'=>0,'status >'=>0 ),"id,status,benefitOfTimeCount,benefitOfTimeUnit" );

                    if($autoCoupSetting[0]['status']>0)
                        $this->CoreModel->create('coupons',array('userId'=>$teacherId,'code'=>$code,'type'=>2,'expiredOn'=>$insertTime+31536000,'createdAt'=>$insertTime,'updatedAt'=>$insertTime,'benefitOfTimeCount'=>$autoCoupSetting[0]['benefitOfTimeCount'],'benefitOfTimeUnit'=>$autoCoupSetting[0]['benefitOfTimeUnit'] ) );

                    if($coupon[0]['type']==2 && $addTime !='' && $addTime !=0)
                    {
                        $memValidity = $this->CoreModel->read('membership_validity',array('userId'=>$coupon[0]['userId'] ),"id,userId,expiredOn,studentLimit,couponValidityExpiry,createdAt,updatedAt" );

                        $this->CoreModel->increaseDecreaseField('membership_validity',array('userId'=>$coupon[0]['userId']),'sharingBenefitTime','+'.$addTime);                             

                        if($memValidity[0]['expiredOn'] > (time()+5*24*60*60*365) )
                        {
                            $this->CoreModel->update('membership_validity',array('sharingBenefitStudents'=>1000,'expiredOn'=>$expiredMem),array('userId'=>$coupon[0]['userId'] ) );
                        }
                        else if($memValidity[0]['expiredOn'] > time())
                        {
                            $this->CoreModel->increaseDecreaseField('membership_validity',array('userId'=>$coupon[0]['userId']),'expiredOn','+'.$addTime);
                            $this->CoreModel->update('membership_validity',array('sharingBenefitStudents'=>1000),array('userId'=>$coupon[0]['userId'] ) );
                        }
                        else
                            $this->CoreModel->update('membership_validity',array('expiredOn'=>$expiredMem,'sharingBenefitStudents'=>1000),array('userId'=>$coupon[0]['userId'] ) );

                        if($memValidity[0]['couponValidityExpiry'] > time())
                        {
                            $this->CoreModel->increaseDecreaseField('membership_validity',array('userId'=>$coupon[0]['userId']),'couponValidityExpiry','+'.$addTime);
                        }
                        else
                            $this->CoreModel->update('membership_validity',array('couponValidityExpiry'=>$expiredMem),array('userId'=>$coupon[0]['userId'] ) );
                    }

                    /* onBoarding Notifications */
                    $currentTime = time();
                    $this->CoreModel->create('onBoardingVisitedScreen',array('userId'=>$teacherId,'screen'=>0,'visited'=>0,'notify'=>0,'createdAt'=>$currentTime ) );
                    /* End onBoarding Notifications*/
                    /* emailForActivatoin*/
                    $this->emailForActivatoin($data['email'],$teacherId);
                     /* emailForActivatoin*/
                    //$response = array('status'=>SUCCESS,'message'=>'Successfully created profile. Please check your mail to activate it.','page'=>''); 
                    $response = array('status'=>SUCCESS,'message'=>"An activation link has been sent to your registered email address. Please verify your email through the activation link. Check your SPAM or JUNK folder if your activation email doesn't arrive in your inbox.",'page'=>''); 
                /*Teacher manage*/
               
            }else{
               $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118)); 
            }
        }
        $this->response($response);
    } //End Function
    public function emailForActivatoin($email='',$uid='')
    {
        $uname = $this->CoreModel->read('users',array('id'=>$uid),'id,userName,firstName' );

        $this->load->library('enc');
        $encryptedPara = $this->enc->doEncrypt($uid);
        $activationURL = base_url().'activision-verify?code='.$encryptedPara;
 
        $mailData = array('uname'=> $uname[0]['userName'],'activationURL'=>$activationURL);
        
        $this->load->library('emaillib');
        $this->emaillib->sendEmails('emailForActivatoinTmpl',$mailData,'Activate your Practice Presto Account',$email,'');
        return true;
    }//End Function

}//End Class 