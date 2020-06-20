<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Users extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
         error_reporting(E_ALL);
        ini_set('display_errors', 1);
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
                $ometa_val['addressType']     = 'Office'; 
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
        $where ="";
        $unionName = $this->post('unionName');
        $id = $this->post('id');

        if(!empty($id) && $id=='fail'){
            $where = array('u.sanghId'=>0,'u.is_deleted'=>0);
        }else if(!empty($id) && $id=='trash'){
            $where = array('u.is_deleted'=>1);
        }else{
            $where = array('u.is_deleted'=>0);
        }
      /*  if(!empty($unionName)){
             $where = "(um.unionName = ".$unionName." OR um.otherUnionName= ".$unionName.")";
        }*/
        $this->user_model->set_data($where);
        //lq();
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
            $row[]      = display_placeholder_text($serData->unionName).(!empty($serData->otherUnionName) ? ' ('.display_placeholder_text($serData->otherUnionName).')':""); 
            $row[]      = display_placeholder_text($serData->contactNumber); 
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
             if(!empty($id) && $id=='trash'){
                 $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to Deleted this record!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>';
                  $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to Recycle this record!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/recordRecycle" data-list="1"  class="on-default edit-row table_action" title="Recycle"><i class="fa fa-recycle" aria-hidden="true"></i></a>';
             }else{
           if($serData->status){

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            $link_url      = base_url().'user-detail/'.encoding($serData->id);
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link_url.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye"  aria-hidden="true"></i></a>';
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to Trash this record!" data-id="'.encoding($serData->id).'" data-url="adminapi/users/recordTrash" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }

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
              $showmsg1        = ($status==1)? "Active" : "Inactive";
            if($up){
                 $r= $this->common_model->activity_log($preId,$showmsg1." Activity");
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
               $this->common_model->activity_log($preId,"Delete Activity");
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
            
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordTrash_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('id'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('users',$where);
        if($dataExist){
          //  $dataExist      = $this->common_model->deleteData('users',$where);
            $this->common_model->updateFields('users',array('is_deleted'=>1),$where);
            $this->common_model->activity_log($preId,"Trash Activity");
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordRecycle_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('id'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('users',$where);
        if($dataExist){
          //  $dataExist      = $this->common_model->deleteData('users',$where);
            $this->common_model->updateFields('users',array('is_deleted'=>0),$where);
              $this->common_model->activity_log($preId,"Record Recycle Activity");
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(123));
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
                           $this->common_model->activity_log($id,"Basic information Update Activity");
                        $status = SUCCESS;
                        $msg  = ResponseMessages::getStatusCodeMessage(123);
                    }else{
                        $status = FAIL;
                        $msg  = ResponseMessages::getStatusCodeMessage(118);
                    }
            }else{
              $result = 0;
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


    function edit_post(){

        $authCheck  = $this->check_admin_service_auth();
        $this->form_validation->set_rules('firstName','first name', 'trim|required');
        $this->form_validation->set_rules('lastName','last name', 'trim|required');
       
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
           $notes ="";
             $id     = decoding($this->post('id'));
            $user                               =  $this->common_model->is_data_exists('users',array('id'=>$id));
            $usermeta                               =  $this->common_model->is_data_exists('user_meta',array('userId'=>$id));
$firstName = $this->post('firstName'); 
            if($user->firstName!=$firstName){
               $notes .= "First name change <b>".display_placeholder_text($user->firstName)."</b> to <b>".$firstName."</b><br>"; 
            } 
            $lastName = $this->post('lastName'); 
            if($user->lastName!=$lastName){
               $notes .= "Last name change <b>".display_placeholder_text($user->lastName)."</b> to <b>".$lastName."</b><br>"; 
            } 
            $parentName = $this->post('parentName'); 
            if($user->parentName!=$parentName){
               $notes .= "S/O OR W/O name change <b>".display_placeholder_text($user->parentName)."</b> to <b>".$parentName."</b><br>"; 
            } 
            $familyHeadName = $this->post('familyHeadName'); 
            if($user->familyHeadName!=$familyHeadName){
               $notes .= "family head name change <b>".display_placeholder_text($user->familyHeadName)."</b> to <b>".$familyHeadName."</b><br>"; 
            }  
            $fullName = $this->post('firstName').' '.$this->post('lastName');
            if($user->fullName!=$fullName){
               $notes .= "full name change <b>".display_placeholder_text($user->fullName)."</b> to <b>".$fullName."</b><br>"; 
            }
            $gender = $this->post('gender');
            if($user->gender!=$gender){
               $notes .= "Gender change <b>".display_placeholder_text($user->gender)."</b> to <b>".$gender."</b><br>"; 
            }
            $maritalStatus = $this->post('maritalStatus');
            if($user->maritalStatus!=$maritalStatus){
               $notes .= "Marital Status change <b>".display_placeholder_text($user->maritalStatus)."</b> to <b>".$maritalStatus."</b><br>"; 
            }
            $dob = date('Y-m-d',strtotime($this->post('dob')));
            if(strtotime($user->dob)!=strtotime($dob)){
               $notes .= "DOB change <b>".date('d/m/Y',strtotime($user->dob))."</b> to <b>".date('d/m/Y',strtotime($dob))."</b><br>"; 
            }
            $actualFirstName = $this->post('actualFirstName');
            if($usermeta->actualFirstName!=$actualFirstName){
               $notes .= "Actual First Name change <b>".display_placeholder_text($usermeta->actualFirstName)."</b> to <b>".$actualFirstName."</b><br>"; 
            }
            $actualLastName = $this->post('actualLastName');
            if($usermeta->actualLastName!=$actualLastName){
               $notes .= "Actual Last Name change <b>".display_placeholder_text($usermeta->actualLastName)."</b> to <b>".$actualLastName."</b><br>"; 
            }
            $actualFullName = $this->post('actualFirstName')." ".$this->post('actualLastName');
            if($usermeta->actualFullName!=$actualFullName){
               $notes .= "Actual Full Name change <b>".display_placeholder_text($usermeta->actualFullName)."</b> to <b>".$actualFullName."</b><br>"; 
            }
             $hindiFirstName = $this->post('hindiFirstName');
            if($usermeta->hindiFirstName!=$hindiFirstName){
               $notes .= "Hindi First Name change <b>".display_placeholder_text($usermeta->hindiFirstName)."</b> to <b>".$hindiFirstName."</b><br>"; 
            }
            $hindiLastName = $this->post('hindiLastName');
            if($usermeta->hindiLastName!=$hindiLastName){
               $notes .= "Hindi Last Name change <b>".display_placeholder_text($usermeta->hindiLastName)."</b> to <b>".$hindiLastName."</b><br>"; 
            }
            $hindiFullName = $this->post('hindiFirstName')." ".$this->post('hindiLastName');
            if($usermeta->hindiFullName!=$hindiFullName){
               $notes .= "Hindi Full Name change <b>".display_placeholder_text($usermeta->hindiFullName)."</b> to <b>".$hindiFullName."</b><br>"; 
            }
            $data_val['firstName']       = $this->post('firstName'); 
            $data_val['lastName']        = $this->post('lastName'); 
            $data_val['parentName']        = $this->post('parentName'); 
            $data_val['familyHeadName']        = $this->post('familyHeadName'); 
            $data_val['fullName']        = $this->post('firstName').' '.$this->post('lastName'); 
            $data_val['gender']        = $this->post('gender'); 
            $data_val['maritalStatus']        = $this->post('maritalStatus'); 
            $data_val['dob']             = date('Y-m-d',strtotime($this->post('dob'))); 


            $user_meta['actualFirstName']       = $this->post('actualFirstName');
            $user_meta['actualLastName']        = $this->post('actualLastName');
             $user_meta['actualFullName']       = $this->post('actualFirstName').' '.$this->post('actualLastName');
            $user_meta['hindiFirstName']        = $this->post('hindiFirstName');
            $user_meta['hindiLastName']         = $this->post('hindiLastName');
            $user_meta['hindiFullName']         = $this->post('hindiFirstName').' '.$this->post('hindiLastName');
            $user_meta['actualParentName']      = $this->post('actualParentName');
            $user_meta['actualFamilyHeadName']  = $this->post('actualFamilyHeadName');
            $user_meta['hindiParentName']       = $this->post('hindiParentName');
            $user_meta['hindiFamilyHeadName']   = $this->post('hindiFamilyHeadName');
            $user_meta['hindiFamilyHeadName']   = $this->post('hindiFamilyHeadName');
           // $user_meta['unionName']             = $this->post('unionName');
            $user_meta['otherUnionName']        = $this->post('otherUnionName');
            $user_meta['bloodGroup']            = @$this->post('bloodGroup');
            $unionName                          = $this->post('unionName');
            $user_meta['unionName']             = $this->post('unionName');
            $sangh                              = $this->common_model->is_data_exists('shree_sangh',array('sanghId'=>$unionName));
            if($sangh){
                $data_val['sanghId']            = $sangh->sanghId;
                $user_meta['unionName']         = $sangh->name;
            }
            

            if($user->sanghId!=$unionName){
                 $sangh_s                               = $this->common_model->is_data_exists('shree_sangh',array('sanghId'=>$user->sanghId));
               $notes .= "Shree sangh change <b>".display_placeholder_text($sangh_s->name)."</b> to <b>".$user_meta['unionName']."</b><br>"; 
            }
            $user_meta['religiousKnowledge']    = $this->post('religiousKnowledge') ? implode(",",$this->post('religiousKnowledge')) :"";
            $id     = decoding($this->post('id'));
         
            $isExist            =  $this->common_model->is_data_exists('users',array('id'=>$id));
            if($isExist){
                    $result = $this->common_model->updateFields('users',$data_val,array('id'=>$id));
                    $this->common_model->updateFields('user_meta',$user_meta,array('userId'=>$id));
                    if($result){
                           $this->common_model->activity_log($id,"Basic information Update Activity",$notes);
                        $status  = SUCCESS;
                        $msg     = ResponseMessages::getStatusCodeMessage(123);
                    }else{
                        $status = FAIL;
                        $msg    = ResponseMessages::getStatusCodeMessage(118);
                    }
            }else{
                $result = 0;
               //$this->common_model->insertData('addresses',$meta_val);
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
                
            
                $userId                     = decoding($this->post('userId'));
                $notes = "";
            $addressId      = $this->post('addressId');
            $oaddressId      = $this->post('paddressId');

            $c_adress            =  $this->common_model->is_data_exists('addresses',array('addressId'=>$addressId));
            $p_adress            =  $this->common_model->is_data_exists('addresses',array('addressId'=>$oaddressId));  
           $zip_code = $this->post('zip_code');
            if($c_adress->zip_code!=$zip_code){
               $notes .= "Current address zip code change <b>".display_placeholder_text($c_adress->zip_code)."</b> to <b>".$zip_code."</b><br>"; 
            }
            $address = $this->post('address');
            if($c_adress->address!=$address){
               $notes .= "Current address change <b>".display_placeholder_text($c_adress->address)."</b> to <b>".$address."</b><br>"; 
            }
            $city = $this->post('city');
            if($c_adress->city!=$city){
               $notes .= "Current address change <b>".display_placeholder_text($c_adress->city)."</b> to <b>".$city."</b><br>"; 
            }
            $tehsil = $this->post('tehsil');
            if($c_adress->tehsil!=$tehsil){
               $notes .= "Current address tehsil change <b>".display_placeholder_text($c_adress->tehsil)."</b> to <b>".$tehsil."</b><br>"; 
            }
            $district = $this->post('district');
            if($c_adress->district!=$district){
               $notes .= "Current address district change <b>".display_placeholder_text($c_adress->district)."</b> to <b>".$district."</b><br>"; 
            }
            $country = $this->post('country');
            if($c_adress->country!=$country){
               $notes .= "Current address country change <b>".display_placeholder_text($c_adress->country)."</b> to <b>".$country."</b><br>"; 
            }
            $state = $this->post('state');
            if($c_adress->state!=$state){
               $notes .= "Current address state change <b>".display_placeholder_text($c_adress->state)."</b> to <b>".$state."</b><br>"; 
            }
            $postName = $this->post('postName');
            if($c_adress->postName!=$postName){
               $notes .= "Current address postName change <b>".display_placeholder_text($c_adress->postName)."</b> to <b>".$postName."</b><br>"; 
            }
            $pzip_code = $this->post('pzip_code');
            if($p_adress->zip_code!=$pzip_code){
               $notes .= "Permanent address zip code change <b>".display_placeholder_text($p_adress->zip_code)."</b> to <b>".$pzip_code."</b><br>"; 
            }
            $paddress = $this->post('paddress');
            if($p_adress->address!=$paddress){
               $notes .= "Permanent address change <b>".display_placeholder_text($p_adress->address)."</b> to <b>".$paddress."</b><br>"; 
            }
            $pcity = $this->post('pcity');
            if($p_adress->city!=$pcity){
               $notes .= "Permanent address change <b>".display_placeholder_text($p_adress->city)."</b> to <b>".$pcity."</b><br>"; 
            }
            $ptehsil = $this->post('ptehsil');
            if($p_adress->tehsil!=$ptehsil){
               $notes .= "Permanent address tehsil change <b>".display_placeholder_text($p_adress->tehsil)."</b> to <b>".$ptehsil."</b><br>"; 
            }
            $pdistrict = $this->post('pdistrict');
            if($p_adress->district!=$pdistrict){
               $notes .= "Permanent address district change <b>".display_placeholder_text($p_adress->district)."</b> to <b>".$pdistrict."</b><br>"; 
            }
            $pcountry = $this->post('pcountry');
            if($p_adress->country!=$pcountry){
               $notes .= "Permanent address country change <b>".display_placeholder_text($p_adress->country)."</b> to <b>".$pcountry."</b><br>"; 
            }
            $pstate = $this->post('pstate');
            if($p_adress->state!=$pstate){
               $notes .= "Permanent address state change <b>".display_placeholder_text($p_adress->state)."</b> to <b>".$pstate."</b><br>"; 
            }
            $ppostName = $this->post('ppostName');
            if($p_adress->postName!=$ppostName){
               $notes .= "Permanent address postName change <b>".display_placeholder_text($p_adress->postName)."</b> to <b>".$ppostName."</b><br>"; 
            }
                $add_meta['userId']         = $userId;
                $add_meta['zip_code']       = $this->post('zip_code');
                $add_meta['address']        = $this->post('address');
                $add_meta['city']           = $this->post('city');
                $add_meta['tehsil']         = $this->post('tehsil');
                $add_meta['district']       = $this->post('district');
                $add_meta['country']        = $this->post('country');
                $add_meta['state']          = $this->post('state');
                $add_meta['postName']       = $this->post('postName');
                $add_meta['addressType']    = 'Current';

                /*****************************************************/
                $add_meta1['userId']        = $userId;
                $add_meta1['zip_code']      = $this->post('pzip_code');
                $add_meta1['address']       = $this->post('paddress');
                $add_meta1['city']          = $this->post('pcity');
                $add_meta1['tehsil']        = $this->post('ptehsil');
                $add_meta1['district']      = $this->post('pdistrict');
                $add_meta1['country']       = $this->post('pcountry');
                $add_meta1['state']         = $this->post('pstate');
                $add_meta1['postName']      = $this->post('ppostName');
                $add_meta1['addressType']   = 'Permanent';
        
            $addressId      = $this->post('addressId');
            $oaddressId      = $this->post('paddressId');
         
            $isExistH            =  $this->common_model->is_data_exists('addresses',array('addressId'=>$addressId));
            $isExistO            =  $this->common_model->is_data_exists('addresses',array('addressId'=>$oaddressId));
            if($isExistH){
                $result = $this->common_model->updateFields('addresses',$add_meta,array('addressId'=>$addressId));
            }else{
                 $result =    $this->common_model->insertData('addresses',$add_meta);
            }
            if($isExistO){
                $result = $this->common_model->updateFields('addresses',$add_meta1,array('addressId'=>$oaddressId));
            }else{
                 $result =    $this->common_model->insertData('addresses',$add_meta1);
            }
            
            if($result){
                $this->common_model->activity_log($userId,"Address Update Activity",$notes);
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
    
   function imageUpdate_post(){
     
        $this->form_validation->set_rules('identityType','identityType', 'trim|required');
        if (empty($_FILES['identityImage']['name'])) {
            $this->form_validation->set_rules('identityImage','identity image','trim|required');
        }
     
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
                
            
                $userId                     = decoding($this->post('userId'));
                $identityType               = $this->post('identityType');
               
                $data_val['identityType']   = $identityType;
               /* image Uploads*/ 
                $image          = array(); $frontImage = '';
                 $this->load->model('Image_model');
                 $this->Image_model->make_dirs('identity');
                 if (!empty($_FILES['identityImage']['name'])) {
                                // Getting file name
                        $filename  = $_FILES['identityImage']['name'];
                        $imageTemp = $_FILES["identityImage"]["tmp_name"];
                        $imageSize = $_FILES["identityImage"]["size"];
                        // Valid extension
                        $valid_ext = array('png','jpeg','jpg','gif','pdf');

                        $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
                        $phototest1 = strtolower($photoExt1);
                            
                        $new_profle_pic = "identityImage_".time().'.'.$phototest1;
                            
                        // Location
                        $location = "uploads/identity/".$new_profle_pic;

                        // file extension
                        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
                        $file_extension = strtolower($file_extension);

                        // Check extension
                        if(in_array($file_extension,$valid_ext))
                        {  
                            // Compress Image
                            $compressedImage = $this->compressedImage($_FILES['identityImage']['tmp_name'],$location,8);
                            
                            if($compressedImage)
                            { 
                                $compressedImageSize = filesize($compressedImage);
                                $data_val['identityImage'] = $new_profle_pic;
                             
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
                  

                /* image Uploads*/

           
         
         
            $isExistH            =  $this->common_model->is_data_exists('users',array('id'=>$userId));
           
            if($isExistH){
                $result = $this->common_model->updateFields('users',$data_val,array('id'=>$userId));
            }else{
                 $result =    0;
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

        // sReturn compressed image 
        return $path;
    }
}//End Class 