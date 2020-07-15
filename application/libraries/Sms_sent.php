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

        $mobNum         = $number;
        $mobileNumber   = str_replace(' ', '', $mobNum);
         $otpNum        = rand(1000,9999);       
        $message        = urlencode("Your Verification OTP Code Is ".$otpNum." ");
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
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 30,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_POSTFIELDS      => $postData,
            CURLOPT_SSL_VERIFYHOST  => 0,
            CURLOPT_SSL_VERIFYPEER  => 0,
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


                    $json = json_decode($response);
                    if($json->type == 'success' )
                    {
                    return array( 'status' =>SUCCESS,'message' => "Message sent successfully.",'code'=>json_decode($response)); 
                    }

                    if($json->type == 'error' )
                    {
                    return array( 'status' =>FAIL,'message' => "Your mobile number invalid ".$json->message." ");

                    }   
          
                     
                } 
                //$data['otpSuccmsg1'] = "Your OTP is been sent to this ".$mobileNumber." by this is ".$response." ";
            return array('status'=>FAIL,'message'=>'Something going wrong.');
    }//end function    
    public function sent_otp_retry_number($number){
        $authKey  = $this->authKey;
        $senderId = $this->senderId;
        $route    = $this->route;

        $mobNum = $number;
        $mobileNumber = str_replace(' ', '', $mobNum);
        /* $otpNum     = rand(1000,9999);       
        $message    = urlencode("Your Verification OTP Code Is ".$otpNum." ");
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender'  => $senderId,
            'route'   => $route
        );
       */
        $url="https://api.msg91.com/api/v5/otp/retry?authkey=$authKey&mobile=$mobileNumber&retrytype=text";
      //  $url="https://api.msg91.com/api/v5/otp/retry?mobile=Mobile%20Number%20with%20Country%20Code&authkey=Authentication%20Key&retrytype="";

        $curl = curl_init($url);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 30,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_POSTFIELDS      => "",
            CURLOPT_SSL_VERIFYHOST  => 0,
            CURLOPT_SSL_VERIFYPEER  => 0,
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


                    $json = json_decode($response);
                    if($json->type == 'success' )
                    {
                    return array( 'status' =>SUCCESS,'message' => "Message re-send successfully.",'code'=>json_decode($response)); 
                    }

                    if($json->type == 'error' )
                    {
                    return array( 'status' =>FAIL,'message' => "Your mobile number invalid  ".$json->message." ");

                    }   
          
                     
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
        $mobileNumber =  str_replace(' ', '', $mobNum);
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
    function normal_msg($mobNum,$text){


       // $senderId = $this->senderId;
        $route    = $this->route;
        $mobileNumber =  str_replace(' ', '', $mobNum);
        

        //Your authentication key
        $authKey = $this->authKey;

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $mobileNumber;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = $this->senderId;

        //Your message to send, Add URL encoding here.
        $message = urlencode($text);

        //Define route 
        $route = "default";
        //Prepare you post parameters
        $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
        );

        //API URL
        $url="http://api.msg91.com/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
             return array( 'status' =>FAIL,'message' => curl_error($ch));
       
        }

        curl_close($ch);
        return array( 'status' =>SUCCESS,'message' => "Message send successfully.",'code' => $output);
        //echo $output;
    }
}//end class