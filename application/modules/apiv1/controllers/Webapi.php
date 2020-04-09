<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Stichoza\GoogleTranslate\GoogleTranslate;
//General service API class 
class Webapi extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
		
    }

    function userStep1_post(){
        $this->form_validation->set_rules('firstName','first name','trim|required');
        $this->form_validation->set_rules('lastName','last name','trim|required');
        $this->form_validation->set_rules('dob','dob','trim|required');
        $this->form_validation->set_rules('parentName','S/O-W/O','trim|required');
        $this->form_validation->set_rules('countrycode','country code','trim|required');
        $this->form_validation->set_rules('contactNumber','contact number','trim|required');
        $this->form_validation->set_rules('aadharNumber','aadhar number','trim|required');

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
                $firstName1              = $this->post('firstName'); 
                $lastName1               = $this->post('lastName'); 
                $parentName1             = $this->post('parentName'); 
                $familyHeadName1             = $this->post('familyHeadName'); 
                $fullName1               = $firstName1.' '.$lastName1 ; 
                $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
                $firstName = $tr->setSource('hi')->setTarget('en')->translate($firstName1);
                $hindiFirstName = $tr->setSource('en')->setTarget('hi')->translate($firstName);
                $lastName = $tr->setSource('hi')->setTarget('en')->translate($lastName1);
                $hindiLastName = $tr->setSource('en')->setTarget('hi')->translate($lastName);

                $fullName = $tr->setSource('hi')->setTarget('en')->translate($fullName1);
                $hindiFullName = $tr->setSource('en')->setTarget('hi')->translate($fullName);

                $parentName = $tr->setSource('hi')->setTarget('en')->translate($parentName1);
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

                $data_val['contactNumber']   = $contactNumber;
                $data_val['aadharNumber']    = $aadharNumber; 
                $data_val['userName']        = rand('111111','999999'); 
                $data_val['password']        = password_hash('123!@#', PASSWORD_DEFAULT);

                $meta_val['hindiFirstName']  = $hindiFirstName;
                $meta_val['hindiLastName']   = $hindiLastName;
                $meta_val['hindiFullName']   = $hindiFullName;
                $meta_val['hindiParentName'] = $hindiParentName;
                $meta_val['hindiFamilyHeadName'] = $hindiFamilyHeadName;
                /* image Uploads*/              
                    $this->load->model('Image_model');
                    $image          = array(); $frontImage = '';
                    if (!empty($_FILES['frontImage']['name'])) {
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
                        }
                        if(!empty($frontImage)){
                            $data_val['frontAadharImage']           =   $frontImage;
                        }                     
                        $image1         = array(); $backImage = '';
                    if (!empty($_FILES['backImage']['name'])) {
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
                        }
                        if(!empty($backImage)){
                            $data_val['backAadharImage']           =   $backImage;
                        } 
                /* image Uploads*/
                $result = $this->common_model->insertData('users',$data_val);
               
                if($result){
                    $meta_val['userId']        = $result; 
                    $this->common_model->insertData('user_meta',$meta_val);
                    $msg  = ResponseMessages::getStatusCodeMessage(122);
                    $response   = array('status'=>SUCCESS,'message'=>$msg);
                }else{
                    $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                } 
            }
            
        }
        $this->response($response);
    } //End Function

}//End Class 