<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Stichoza\GoogleTranslate\GoogleTranslate;
//General service API class 
class Webapi extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
		error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    function userStep1_post(){
        $this->form_validation->set_rules('fullName','full name','trim|required');
      //  $this->form_validation->set_rules('firstName','first name','trim|required');
      //  $this->form_validation->set_rules('lastName','last name','trim|required');
        $this->form_validation->set_rules('dob','dob','trim|required');
        $this->form_validation->set_rules('otpnumber','otp number','trim|required');
        $this->form_validation->set_rules('parentName','S/O-W/O','trim|required');
        $this->form_validation->set_rules('countrycode','country code','trim|required');
        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
        $this->form_validation->set_rules('aadharNumber','aadhar number','trim|required|min_length[12]');
        if (empty($_FILES['frontImage']['name'])) {
            $this->form_validation->set_rules('frontImage','Aadhar front image','trim|required');
        }
        if (empty($_FILES['backImage']['name'])) {
            $this->form_validation->set_rules('backImage','Aadhar back image','trim|required');
        }
        $this->form_validation->set_message('min_length', lang('Please_enter_at_least_12_digit_aadhaar_number'));
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $aadharNumber           = trim(str_replace(array('(',')','-'),array('','',''),$this->post('aadharNumber'))); 
            $isExist            =  $this->common_model->is_data_exists('users',array('aadharNumber'=>$aadharNumber));
            if($isExist){
                  $response   = array('status'=>FAIL,'message'=>'aadhar number already exist');
                   $this->response($response);
            }else{
               // pr($this->post());
                $data_val   = $meta_val  = array();
                $fuN              = $this->post('fullName');
                $fuN = explode(" ", $fuN); 
                $fullName1              = $this->post('fullName'); 
                $firstName1              = $this->post('firstName'); 
                $lastName1               = $this->post('lastName'); 
                $parentName1             = $this->post('parentName'); 
                $familyHeadName1             = $this->post('familyHeadName'); 
              //  $fullName1               = $firstName1.' '.$lastName1 ; 
                $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
              

                $fullName = $tr->setSource('hi')->setTarget('en')->translate($fullName1);
                $hindiFullName = $tr->setSource('en')->setTarget('hi')->translate($fullName1);

           
                $fulldivideE    = explode(" ",$fullName);
                $firstName      = isset($fulldivideE[0]) ? $fulldivideE[0] :"";
                $firstName      = trim($firstName);
                // elements 
                unset($fulldivideE[0]); 
                $lastName       = isset($fulldivideE[1]) ? (implode(" ",$fulldivideE)) :"";
                $lastName = trim($lastName);
                
                $fulldivideH    = explode(" ",$hindiFullName);
                $hindiFirstName = isset($fulldivideH[0]) ? $fulldivideH[0] :"";
                $hindiFirstName = trim($hindiFirstName);
                // elements 
                unset($fulldivideH[0]); 
                $hindiLastName = isset($fulldivideH[1]) ? (implode(" ",$fulldivideH)) :"";
                $hindiLastName = trim($hindiLastName);


                $parentName     = $tr->setSource('hi')->setTarget('en')->translate($parentName1);
                $hindiParentName = $tr->setSource('en')->setTarget('hi')->translate($parentName);



                $familyHeadName = $tr->setSource('hi')->setTarget('en')->translate($familyHeadName1);
                $hindiFamilyHeadName = $tr->setSource('en')->setTarget('hi')->translate($familyHeadName);



                $contactNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
                $data_val['dob']        = date('Y-m-d',strtotime($this->post('dob'))); 

                $data_val['firstName']      = $firstName;
                $data_val['lastName']      = $lastName; 
                $data_val['fullName']      = $fullName; 
                $data_val['parentName']      = $parentName; 
                $data_val['familyHeadName']      = $familyHeadName; 
                $data_val['countrycode']     = $this->post('countrycode'); 
                $data_val['whose_contact_number']     = $this->post('whose_contact_number'); 
                $data_val['mobileVerify']     = $this->post('mobileVerify'); 

                $data_val['contactNumber']   = $contactNumber;
                $data_val['aadharNumber']    = $aadharNumber; 
                $data_val['userName']        = rand('111111','999999'); 
                $data_val['password']        = password_hash('123!@#', PASSWORD_DEFAULT);

                $meta_val['hindiFirstName']  = $hindiFirstName;
                $meta_val['hindiLastName']   = $hindiLastName;
                $meta_val['hindiFullName']   = $hindiFullName;
                $meta_val['hindiParentName'] = $hindiParentName;
                $meta_val['hindiFamilyHeadName'] = $hindiFamilyHeadName;
                $meta_val['actualFirstName']  =  trim(isset($fuN[0]) ? $fuN[0]:""); 
                 unset($fuN[0]); 
                $meta_val['actualLastName']   = trim(isset($fuN[1]) ? implode(" ",$fuN):"");
                $meta_val['actualFullName']   = $this->post('fullName');
                $meta_val['actualParentName'] = $this->post('parentName');
                $meta_val['actualFamilyHeadName'] = $this->post('familyHeadName'); 
            
                /* image Uploads*/ 
                $image          = array(); $frontImage = '';
                 $this->load->model('Image_model');
                 $this->Image_model->make_dirs('aadhar');
                 if (!empty($_FILES['frontImage']['name'])) {
                                // Getting file name
                        $filename  = $_FILES['frontImage']['name'];
                        $imageTemp = $_FILES["frontImage"]["tmp_name"];
                        $imageSize = $_FILES["frontImage"]["size"];
                        // Valid extension
                        $valid_ext = array('png','jpeg','jpg','gif','pdf');

                        $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
                        $phototest1 = strtolower($photoExt1);
                            
                        $new_profle_pic = "aadharfront_".time().'.'.$phototest1;
                            
                        // Location
                        $location = "uploads/aadhar/".$new_profle_pic;

                        // file extension
                        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
                        $file_extension = strtolower($file_extension);

                        // Check extension
                        if(in_array($file_extension,$valid_ext))
                        {  
                            // Compress Image
                            $compressedImage = $this->compressedImage($_FILES['frontImage']['tmp_name'],$location,10);
                            
                            if($compressedImage)
                            { 
                                $compressedImageSize = filesize($compressedImage);

                                 $data_val['frontAadharImage'] = $new_profle_pic;
                             
                            }
                            else
                            {
                               // $statusMsg = "Image compress failed!";
                                 $response = array('status' => FAIL, 'message' => "Image compress failed!");
                           $this->response($response);die;
                            }   
                        }
                        else
                        { 
                            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                             $response = array('status' => FAIL, 'message' =>$statusMsg);
                           $this->response($response);die;
                        }
                    } 
                     $image1         = array(); $backImage = '';
                 if (!empty($_FILES['backImage']['name'])) {
                                // Getting file name
                        $filenameb  = $_FILES['backImage']['name'];
                        $imageTempb = $_FILES["backImage"]["tmp_name"];
                        $imageSizeb = $_FILES["backImage"]["size"];
                        // Valid extension
                        $valid_extb = array('png','jpeg','jpg','gif','pdf');

                        $photoExt1b = @end(explode('.', $filenameb)); // explode the image name to get the extension
                        $phototest1b = strtolower($photoExt1b);
                            
                        $new_profle_picb = "aadharback_".time().'.'.$phototest1b;
                            
                        // Location
                        $locationb = "uploads/aadhar/".$new_profle_picb;

                        // file extension
                        $file_extensionb = pathinfo($locationb, PATHINFO_EXTENSION);
                        $file_extensionb = strtolower($file_extensionb);

                        // Check extension
                        if(in_array($file_extensionb,$valid_extb))
                        {  
                            // Compress Image
                            $compressedImageb = $this->compressedImage($_FILES['backImage']['tmp_name'],$locationb,10);
                            
                            if($compressedImageb)
                            { 
                                $compressedImageSizeb = filesize($compressedImageb);

                                $data_val['backAadharImage'] = $new_profle_picb;
                            
                            }
                            else
                            {
                               // $statusMsg = "Image compress failed!";
                                 $response = array('status' => FAIL, 'message' => "Image compress failed!");
                                $this->response($response);die;
                            }   
                        }
                        else
                        { 
                            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                             $response = array('status' => FAIL, 'message' =>$statusMsg);
                           $this->response($response);die;
                        }
                    }             
                   // $this->load->model('Image_model');
                    
                  /*  if (!empty($_FILES['frontImage']['name'])) {
                        $folder     = 'aadhar';
                        $image      = $this->Image_model->upload_image('frontImage',$folder); //upload media of Seller
                        //check for error
                        if(array_key_exists("error",$image) && !empty($image['error'])){
                            $response = array('status' => FAIL, 'message' => strip_tags($image['error'].'(In front aadhar Image)'));
                           $this->response($response);die;
                        }
                        //check for image name if present
                        if(array_key_exists("image_name",$image)):
                            $frontImage = $image['image_name'];

                        endif;
                        }*/
                     /*   if(!empty($frontImage)){
                            $data_val['frontAadharImage']           =   $frontImage;
                        }                     
                       */
                   
                 /*   if (!empty($_FILES['backImage']['name'])) {
                        $folder     = 'aadhar';
                        $image1      = $this->Image_model->upload_image('backImage',$folder); //upload media of Seller
                        //check for error
                        if(array_key_exists("error",$image1) && !empty($image1['error'])){
                            $response = array('status' => FAIL, 'message' => strip_tags($image1['error'].'(In back aadhar Image)'));
                           $this->response($response);die;
                        }
                        //check for image name if present
                        if(array_key_exists("image_name",$image1)):
                            $backImage = $image1['image_name'];

                        endif;
                        }*/
                     /*   if(!empty($backImage)){
                            $data_val['backAadharImage']           =   $backImage;
                        } */
                /* image Uploads*/
                $result = $this->common_model->insertData('users',$data_val);
               
                if($result){
                    $meta_val['userId']             = $result;
                    $this->common_model->insertData('user_meta',$meta_val);
                     
                    $_SESSION['userId']             = $result;  
                    $_SESSION['userStep']           = 2;  
                       //$_SESSION['userStep']        = 2;  
                  
                    $msg  = 'Step-1 '.ResponseMessages::getStatusCodeMessage(122);
                    $response   = array('status'=>SUCCESS,'message'=>$msg);
                }else{
                    $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                } 
            }
            
        }
        $this->response($response);
    } //End Function

    function userStep2_post(){
        $this->form_validation->set_rules('userId','userId','trim|required');
        $this->form_validation->set_rules('gender','gender','trim|required');
        $this->form_validation->set_rules('maritalStatus','marital status','trim|required');
        $this->form_validation->set_rules('unionName','union name','trim|required');
      
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $userId              = $this->post('userId'); 
            $isExist             =  $this->common_model->is_data_exists('users',array('id'=>$userId));
            if($isExist){
                $user_val = $user_meta = $add_meta = $add_meta1 = $add_meta2 = array();

              //  $user_val['userId']         = $userId;
                $user_val['gender']         = $this->post('gender');
                $user_val['maritalStatus']  = $this->post('maritalStatus');
                $user_val['communicationCode']  = $this->post('zip_code');

              //  $user_meta['userId']        = $userId;
                $user_meta['unionName']     = $this->post('unionName');
                $user_meta['otherUnionName']     = $this->post('otherUnionName');
                $user_meta['profession']    = $this->post('profession');
                $user_meta['subProfession']    = @$this->post('subProfession');
                $user_meta['otherProfession']    = @$this->post('otherProfession');
                $user_meta['religiousKnowledge']      = $this->post('religiousKnowledge') ? implode(",",$this->post('religiousKnowledge')) :"";

                $add_meta['userId']         = $userId;
                $add_meta['zip_code']       = $this->post('zip_code');
                $add_meta['address']        = $this->post('address');
                $add_meta['city']           = $this->post('city');
                $add_meta['tehsil']         = $this->post('tehsil');
                $add_meta['district']       = $this->post('district');
                $add_meta['country']        = $this->post('country');
                $add_meta['state']          = $this->post('state');
                $add_meta['postName']          = $this->post('postName');
                $add_meta['addressType']    = 'Current';

                $add_meta1['userId']      = $userId;
                $add_meta1['zip_code']      = $this->post('pzip_code');
                $add_meta1['address']       = $this->post('paddress');
                $add_meta1['city']          = $this->post('pcity');
                $add_meta1['tehsil']        = $this->post('ptehsil');
                $add_meta1['district']      = $this->post('pdistrict');
                $add_meta1['country']       = $this->post('pcountry');
                $add_meta1['state']         = $this->post('pstate');
                $add_meta1['postName']         = $this->post('ppostName');
                $add_meta1['addressType']   = 'Permanent';
                
                $add_meta2['userId']        = $userId;
                $add_meta2['zip_code']      = $this->post('ozip_code');
                $add_meta2['address']       = $this->post('oaddress');
                $add_meta2['city']          = $this->post('ocity');
                $add_meta2['tehsil']        = $this->post('otehsil');
                $add_meta2['district']      = $this->post('odistrict');
                $add_meta2['country']       = $this->post('ocountry');
                $add_meta2['state']         = $this->post('ostate');
                $add_meta2['postName']         = $this->post('opostName');
                $add_meta2['addressType']   = 'Office';
                $this->common_model->updateFields('users',$user_val,array('id'=>$userId));
                $this->common_model->updateFields('user_meta',$user_meta,array('userId'=>$userId));
                $this->common_model->insertData('addresses',$add_meta);
                $this->common_model->insertData('addresses',$add_meta1);
                $this->common_model->insertData('addresses',$add_meta2);
                $msg  = 'Step-2 '.ResponseMessages::getStatusCodeMessage(122);
                $_SESSION['userStep']        = 3; 
                $response   = array('status'=>SUCCESS,'message'=>$msg);

            }else{
               // pr($this->post());
                $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));   
            }
            
        }
        $this->response($response);
    } //End Function
    
    function userStep3_post(){
        $this->form_validation->set_rules('userId','userId','trim|required');
     
      
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $userId              = $this->post('userId'); 
            $isExist             =  $this->common_model->is_data_exists('users',array('id'=>$userId));
            if($isExist){
                $user_val = $user_meta = $add_meta = $add_meta1 = $add_meta2 = array();

              //  $user_val['userId']         = $userId;
                $user_val['email']         = $this->post('email');
            
                $user_meta['bloodGroup']     = $this->post('bloodGroup');
                $user_meta['education']      = $this->post('education');

                
                $this->common_model->updateFields('users',$user_val,array('id'=>$userId));
                $this->common_model->updateFields('user_meta',$user_meta,array('userId'=>$userId));
             
                 $msg  = lang('Your_form_submitted_successfully');;
                  $_SESSION['userStep']        = 0; 
                 $response   = array('status'=>SUCCESS,'message'=>$msg);

            }else{
               // pr($this->post());
                $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));   
            }
            
        }
        $this->response($response);
    } //End Function
 
    function smsSentOtp_post(){
        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
     
      
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $contactNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
            $this->load->library('sms_sent');
            $response           = $this->sms_sent->sent_otp_number($contactNumber); 
              
               // $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));   
            //}
            
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
            $this->load->library('sms_sent');
            $response           = $this->sms_sent->sent_otp_retry_number($contactNumber); 
               // $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));   
            //}
            
        }
        $this->response($response);
    } //End Function
    

    function verifyOtpCode_post(){
        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
        $this->form_validation->set_rules('otpnumber','otpnumber','trim|required');
     
      
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $contactNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
            $otpnumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('otpnumber')));
            $this->load->library('sms_sent');
            $response           = $this->sms_sent->verify_otp_code($contactNumber,$otpnumber); 
        }
        $this->response($response);
    } //End Function

    function checkAadharNumber_post(){
        $this->form_validation->set_rules('aadharNumber','aadhar number','trim|required');
      
      
        if($this->form_validation->run() == FALSE)
        {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
        }
        else
        {
            $aadharNumber          = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('aadharNumber')));
           
            $isExist            =  $this->common_model->is_data_exists('users',array('aadharNumber'=>$aadharNumber)); 
            if($isExist){
                $response = array('status' =>false);
            }else{
                 $response = array('status' =>true);
            }
        }
        $this->response($response);
    } //End Function


    // Compress image
    function compressedImage($source, $path, $quality) 
    {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        // Save image 
        imagejpeg($image, $path, $quality);
     
        // Return compressed image 
        return $path;
    }
}//End Class 