<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Webapi extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
		
    }

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

}//End Class 