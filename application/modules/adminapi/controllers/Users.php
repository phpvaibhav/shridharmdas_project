<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Users extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    function add_post(){
       // $authCheck  = $this->check_admin_service_auth();
        $this->form_validation->set_rules('firstName','first name', 'trim|required');
        $this->form_validation->set_rules('lastName','last name', 'trim|required');
        $this->form_validation->set_rules('dob','date of birth', 'trim|required');
        $this->form_validation->set_rules('gender','gender', 'trim|required');
        $this->form_validation->set_rules('contactNumber','contact number', 'trim|required');
  /*      $this->form_validation->set_rules('aadharNumber','aadhar number', 'trim|required|is_unique[users.aadharNumber]',
            array('is_unique' => 'aadhar number already exist'));*/
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            // pr($this->post());
            $data_val['firstName']       = $this->post('firstName'); 
            $data_val['lastName']        = $this->post('lastName'); 
            $data_val['fullName']        = $this->post('firstName').' '.$this->post('lastName'); 
            $data_val['dob']             = date('Y-m-d',strtotime($this->post('dob'))); 
            $data_val['gender']          = $this->post('gender'); 
            $data_val['email']          = $this->post('email'); 
            $data_val['parentName']      = $this->post('parentName'); 
            $data_val['maritalStatus']   = $this->post('maritalStatus'); 
            $data_val['contactNumber']   = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
    
            
            $aadharNumber                = trim(str_replace(array('(',')','-'),array('','',''),$this->post('aadharNumber'))); 
            $data_val['aadharNumber']    = $aadharNumber; 
            $data_val['userName']        = rand('111111','999999'); 
            $data_val['password']        = password_hash('123!@#', PASSWORD_DEFAULT);; 
               $country        = $this->post('country'); 
            $state         = $this->post('state'); 
            $ocountry        = $this->post('ocountry'); 
            $ostate         = $this->post('ostate'); 
            $oaddress = $this->post('oaddress');
           // pr( $data_val);
             $meta_val['addressType']         = 'Home'; 
            $meta_val['address']         = $this->post('address'); 
            $meta_val['country']         = isset($country) ? $country :""; 
            $meta_val['state']           = isset($state) ? $state :""; 
            $meta_val['city']            = $this->post('city'); 
            $meta_val['tehsil']          = $this->post('tehsil'); 
            $meta_val['district']        = $this->post('district'); 
            $meta_val['zip_code']        = $this->post('zip_code'); 
               //pr($meta_val);
             if(isset($oaddress) && !empty($oaddress)){
                $ometa_val['address']         = $this->post('oaddress'); 
                $ometa_val['addressType']         = 'Office'; 
                $ometa_val['country']         = isset($ocountry) ? $ocountry :""; 
                $ometa_val['state']           = isset($ostate) ? $ostate :""; 
                $ometa_val['city']            = $this->post('ocity'); 
                $ometa_val['tehsil']          = $this->post('otehsil'); 
                $ometa_val['district']        = $this->post('odistrict'); 
                $ometa_val['zip_code']        = $this->post('ozip_code'); 
               //pr($meta_val);
            }
            $user_meta['preceptorName']  = $this->post('preceptorName');
            $user_meta['unionName']      = $this->post('unionName');
            $user_meta['education']      = $this->post('education');
            $user_meta['religiousKnowledge']      = $this->post('religiousKnowledge') ? implode(",",$this->post('religiousKnowledge')) :"";
            $user_meta['profession']      = $this->post('profession');
            $user_meta['bloodGroup']      = $this->post('bloodGroup');
            $user_meta['unionResponsibility']      = $this->post('unionResponsibility');
            $id     = decoding($this->post('id'));
         
            $isExist            =  $this->common_model->is_data_exists('users',array('id'=>$id));
            if($isExist){
                  $response   = array('status'=>FAIL,'message'=>'aadhar number already exist');
                   $this->response($response);
            }else{
                 $result = $this->common_model->insertData('users',$data_val);
                 $user_meta['userId']        = $result; 
                 $meta_val['userId']        = $result; 
                 $ometa_val['userId']        = $result; 
                $this->common_model->insertData('user_meta',$user_meta);
                $this->common_model->insertData('addresses',$meta_val);
                $this->common_model->insertData('addresses',$ometa_val);
               // $this->common_model->insertData('addresses',$meta_val);

                $msg  = ResponseMessages::getStatusCodeMessage(122);
            }
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
        }
        $this->response($response);
    }//end function
    function list_post(){
        $this->load->helper('text');
        $this->load->model('user_model');
        $this->user_model->set_data();
        $list   = $this->user_model->get_list();
        
        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $link_url   = base_url().'user-detail/'.encoding($serData->id);
            $row[]      = $no;
            $row[]      = '<a href="'.$link_url.'" >'.display_placeholder_text($serData->hindiFullName).'</a>'; 
            $row[]      = display_placeholder_text($serData->hindiParentName); 
            $row[]      = display_placeholder_text($serData->hindiFamilyHeadName); 
            $row[]      = display_aadhar_text($serData->aadharNumber,6); 
            $row[]      = @$serData->countrycode.' '.display_mobile_text($serData->contactNumber); 
            $row[]      = display_placeholder_text(date('d-m-Y',strtotime($serData->dob))); 
          
            switch ($serData->status) {
             
                case 1:
                   $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
                    break;
                case 0:
                   $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                    break;
                
                default:
                      $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                    break;
            }          
            switch ($serData->verifyUser) {
             
                case 1:
                   $row[] = '<label class="label label-success">'.$serData->verifyShow.'</label>';
                    break;
                case 0:
                   $row[] = '<label class="label label-warning">'.$serData->verifyShow.'</label>';
                    break;
                
                default:
                      $row[] = '<label class="label label-warning">'.$serData->verifyShow.'</label>';
                    break;
            }
       
            $link      ='javascript:void(0)';
            $action .= "";
           if($serData->status){

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            $link_url      = base_url().'user-detail/'.encoding($serData->id);
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link_url.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye"  aria-hidden="true"></i></a>';
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->user_model->count_all(),
            "recordsFiltered"   => $this->user_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('id'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('users',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $up      = $this->common_model->updateFields('users',array('status'=>$status),$where);
            $showmsg        = ($status==1)? lang("Active") : lang("Inactive");
            if($up){
                  $response       = array('status'=>SUCCESS,'message'=>$showmsg." ".ResponseMessages::getStatusCodeMessage(128));       
            }else{
                 $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
            }
              
           
        }
        $this->response($response);
    }//end function
    function recordDelete_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('id'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('users',$where);
        if($dataExist){
            $dataExist      = $this->common_model->deleteData('users',$where);
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function update_post(){
        $authCheck  = $this->check_admin_service_auth();
        $this->form_validation->set_rules('firstName','first name', 'trim|required');
        $this->form_validation->set_rules('lastName','last name', 'trim|required');
        $this->form_validation->set_rules('dob','date of birth', 'trim|required');
        $this->form_validation->set_rules('gender','gender', 'trim|required');
        $this->form_validation->set_rules('contactNumber','contact number', 'trim|required');
       // $this->form_validation->set_rules('aadharNumber','aadhar number', 'trim|required|is_unique[users.aadharNumber]',
           // array('is_unique' => 'aadhar number already exist'));
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
          
            $data_val['firstName']       = $this->post('firstName'); 
            $data_val['lastName']        = $this->post('lastName'); 
            $data_val['fullName']        = $this->post('firstName').' '.$this->post('lastName'); 
            $data_val['dob']             = date('Y-m-d',strtotime($this->post('dob'))); 
            $data_val['gender']          = $this->post('gender'); 
            $data_val['email']           = $this->post('email'); 
            $data_val['parentName']      = $this->post('parentName'); 
            $data_val['maritalStatus']   = $this->post('maritalStatus'); 
            $data_val['contactNumber']   = trim(str_replace(array('(',')','-',' '),array('','','',''),$this->post('contactNumber')));
    
            
            $aadharNumber                = trim(str_replace(array('(',')','-'),array('','',''),$this->post('aadharNumber'))); 
            $data_val['aadharNumber']    = $aadharNumber; 

            $user_meta['preceptorName']  = $this->post('preceptorName');
            $user_meta['unionName']      = $this->post('unionName');
            $user_meta['education']      = $this->post('education');
            $user_meta['religiousKnowledge']      = $this->post('religiousKnowledge') ? implode(",",$this->post('religiousKnowledge')) :"";
            $user_meta['profession']      = $this->post('profession');
            $user_meta['bloodGroup']      = $this->post('bloodGroup');
            $user_meta['unionResponsibility']      = $this->post('unionResponsibility');
            $id     = decoding($this->post('id'));
         
            $isExist            =  $this->common_model->is_data_exists('users',array('id'=>$id));
            if($isExist){
                    $result = $this->common_model->updateFields('users',$data_val,array('id'=>$id));
                    $this->common_model->updateFields('user_meta',$user_meta,array('userId'=>$id));
                    if($result){
                    $status = SUCCESS;
                        $msg  = ResponseMessages::getStatusCodeMessage(123);
                    }else{
                        $status = FAIL;
                        $msg  = ResponseMessages::getStatusCodeMessage(118);
                    }
            }else{
              $result=0;
               // $this->common_model->insertData('addresses',$meta_val);

               
            }
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
        }
        $this->response($response);
    }//end function
   function addressupdate_post(){
       // $authCheck  = $this->check_admin_service_auth();
        $this->form_validation->set_rules('address','address', 'trim|required');
       
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
         
            $country        = $this->post('country'); 
            $state          = $this->post('state'); 
            $ocountry       = $this->post('ocountry'); 
            $ostate         = $this->post('ostate'); 
            $oaddress       = $this->post('oaddress');
           // pr( $data_val);
            $meta_val['addressType']         = 'Home'; 
            $meta_val['address']         = $this->post('address'); 
            $meta_val['country']         = isset($country) ? $country :""; 
            $meta_val['state']           = isset($state) ? $state :""; 
            $meta_val['city']            = $this->post('city'); 
            $meta_val['tehsil']          = $this->post('tehsil'); 
            $meta_val['district']        = $this->post('district'); 
            $meta_val['zip_code']        = $this->post('zip_code'); 
               //pr($meta_val);
            if(isset($oaddress) && !empty($oaddress)){
                $ometa_val['address']         = $this->post('oaddress'); 
                $ometa_val['addressType']         = 'Office'; 
                $ometa_val['country']         = isset($ocountry) ? $ocountry :""; 
                $ometa_val['state']           = isset($ostate) ? $ostate :""; 
                $ometa_val['city']            = $this->post('ocity'); 
                $ometa_val['tehsil']          = $this->post('otehsil'); 
                $ometa_val['district']        = $this->post('odistrict'); 
                $ometa_val['zip_code']        = $this->post('ozip_code'); 
               //pr($meta_val);
            }
        
            $addressId      = $this->post('addressId');
            $oaddressId      = $this->post('oaddressId');
         
            $isExistH            =  $this->common_model->is_data_exists('addresses',array('addressId'=>$addressId));
            $isExistO            =  $this->common_model->is_data_exists('addresses',array('addressId'=>$oaddressId));
            if($isExistH){
                $result = $this->common_model->updateFields('addresses',$meta_val,array('addressId'=>$addressId));
            }
            if($isExistO){
                $result = $this->common_model->updateFields('addresses',$ometa_val,array('addressId'=>$oaddressId));
            }
            if($result){
                $status = SUCCESS;
                $msg  = ResponseMessages::getStatusCodeMessage(123);
            }else{
                $status = FAIL;
                $msg  = ResponseMessages::getStatusCodeMessage(118);
            }
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
        }
        $this->response($response);
    }//end function
}//End Class 