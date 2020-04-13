<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sms_sent{

    var $authKey       = '325894A7VxW8uH5e918713P1', //server authKey
    $senderId      = 'SDhrmd',//senderId 
    $route      = 'default';

    public function sent_otp_number($number){
        $authKey  = $this->authKey;
        $senderId = $this->senderId;
        $route    = $this->route;

        $mobNum = $number;
        $mobileNumber = '91'.str_replace(' ', '', $mobNum);
         $otpNum     = rand(1000,9999);       
        $message    = urlencode("Your Verification OTP Code Is ".$otpNum." ");
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender'  => $senderId,
            'route'   => $route
        );
       
        $url="http://api.msg91.com/api/sendotp.php?authkey=$authKey&mobile=$mobileNumber&message=$message&sender=$senderId&otp=$otpNum";

        $curl = curl_init($url);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) 
        {
           return array('status'=>0,'message'=>$err);// echo "cURL Error #:" . $err;
        }
                else
                {

                 //   pr(json_decode($response,true));
                    return array('status'=>SUCCESS,'message'=>'Message sent successfully.','code'=>json_decode($response));
                   // echo $response;

                    //echo "Your OTP is been sent to this ".$mobileNumber." ";
                    /*$json = json_decode($response);
                    if($json->type == 'success' )
                    {
                        //$data['otpSuccmsg'] = array('msg' => "Your OTP is been sent to this ".$mobileNumber." by this is ".$response." ", 'status' =>1);
                        $data['otpSuccmsg'] = array('msg' => "Your OTP is been sent to this ".$mobileNumber." ", 'status' =>1); 
                    }

                    if($json->type == 'error' )
                    {
                        $data['otpErrorMsg'] = "Your OTP ".$json->message." ";
                    }*/
                     
                } 
                //$data['otpSuccmsg1'] = "Your OTP is been sent to this ".$mobileNumber." by this is ".$response." ";
            return array('status'=>FAIL,'message'=>'Something going wrong.');
    
       
    }//end function

    public function verify_otp_code($number,$otp){
        $authKey  = $this->authKey;
        $senderId = $this->senderId;
        $route    = $this->route;
        $mobNum = $number;
        $otpNum = $otp;
        $mobileNumber =  '91'.str_replace(' ', '', $mobNum);
        $otpNumber = str_replace(' ', '', $otpNum);

        $url = "https://api.msg91.com/api/v5/otp/verify?mobile=$mobileNumber&otp=$otpNumber&authkey=$authKey";
            
        $curl = curl_init($url);
            curl_setopt_array($curl, array(
                // CURLOPT_URL => "https://api.msg91.com/api/v5/otp/verify?mobile=%24mobile&otp=%24otp&authkey=%24authentication_key",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) 
            {
                 return array('status'=>FAIL,'message'=>$err);// echo "cURL Error #:" . $err;
            }
            else
            {
                $json = json_decode($response);
                if($json->type == 'success' )
                {
                   return array( 'status' =>SUCCESS,'message' => "Your OTP is been verified "); 
                }

                if($json->type == 'error' )
                {
                    return array( 'status' =>FAIL,'message' => "Your OTP not verified  ".$json->message." ");
                  
                }   
        }
         return array('status'=>FAIL,'message'=>'Something going wrong.');
            
    }//end function
}//end class