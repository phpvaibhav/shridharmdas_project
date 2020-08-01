<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class User extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_service_auth();
        
    }

    public function changePassword_post()
    {

        $authCheck  = $this->check_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('npassword', 'new password', 'trim|required|matches[rnpassword]|min_length[6]');
        $this->form_validation->set_rules('rnpassword', 'retype new password ','trim|required|min_length[6]');
       if($this->form_validation->run($this) == FALSE){
            $messages       = (validation_errors()) ? validation_errors() : '';
            $response       = array('status' => 0, 'message' => $messages);
        }else{
            $password       = $this->input->post('password');
            $npassword      = $this->input->post('npassword');
            $select         = "password";
            $where          = array('id' => $userId); 
            $admin          = $this->common_model->getsingle('users', $where,'password');
            if(password_verify($password, $admin['password'])){
                $set        = array('password'=> password_hash($this->input->post('npassword') , PASSWORD_DEFAULT)); 
                $set['activePassword'] =1;
                $update     = $this->common_model->updateFields('users', $set, $where);
                if($update){
                    $res = array();
                    if($update){
                        $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(123));
                    }else{
                        $response = array('status' => FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));
                    }    
                } 
            }else{
                $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
            }
        }
       $this->response($response);
    }//End Function

    public function getProfile_get()
    {

		$authCheck  = $this->check_service_auth();
		$authToken  = $this->authData->authToken;
		$userId     = $this->authData->id;
		$where          = array('id' => $userId); 
		$userData          =  $this->common_model->GetSingleJoinRecord('users','id','user_meta','userId',"*",$where);
		if($userData){
		    
		    $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$userData);
		}else{
		    $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
		}
       
       $this->response($response);
    }//End Function
    
    public function getAddress_get()
    {

		$authCheck  = $this->check_service_auth();
		$authToken  = $this->authData->authToken;
		$userId     = $this->authData->id;
		$where          = array('userId' => $userId); 
		$userData          =  $this->common_model->getAll('addresses',$where);
		if($userData){
		    
		    $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$userData);
		}else{
		    $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
		}
       
       $this->response($response);
    }//End Function

    public function getUser_post()
    {

		$authCheck  = $this->check_service_auth();
		$authToken  = $this->authData->authToken;
		$userId     = $this->authData->id;
		$this->load->model('adminapi/user_model');
		$search = $this->post('searchKey');

		$_POST['search']['value']= $search;
		$where = "";
		$this->user_model->set_data($where);
        //lq();
        $list   =  $this->user_model->get_list();
		///lq();
		if($list){
		    
		    $response = array('status' =>SUCCESS, 'message' => ResponseMessages::getStatusCodeMessage(200),'data'=>$list);
		}else{
		    $response = array('status' =>FAIL, 'message' => ResponseMessages::getStatusCodeMessage(118));                 
		}
       
       $this->response($response);
    }//End Function

   function address_update_post(){
      	$authCheck  = $this->check_service_auth();
		$authToken  = $this->authData->authToken;
		$userId     = $this->authData->id;
        $this->form_validation->set_rules('addressType','address type', 'trim|required');
        $this->form_validation->set_rules('zip_code','zip code', 'trim|required');
        $this->form_validation->set_rules('address','address', 'trim|required');
        $this->form_validation->set_rules('postName','postName', 'trim|required');
        $this->form_validation->set_rules('tehsil','tehsil', 'trim|required');
        $this->form_validation->set_rules('city','city', 'trim|required');
        $this->form_validation->set_rules('district','district', 'trim|required');
        $this->form_validation->set_rules('state','state', 'trim|required');
        $this->form_validation->set_rules('country','country', 'trim|required');
        

        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
        	 $addressType = $this->post('addressType');
            if($addressType=='Current' OR $addressType=='Permanent') {
            	$notes = "";
            	$c_adress            =  $this->common_model->is_data_exists('addresses',array('addressType'=>$addressType,'userId'=>$userId));
            	/*activity*/

         
           $zip_code = $this->post('zip_code');
            if($c_adress->zip_code!=$zip_code){
               $notes .= $addressType." address zip code change <b>".display_placeholder_text($c_adress->zip_code)."</b> to <b>".$zip_code."</b><br>"; 
            }
            $address = $this->post('address');
            if($c_adress->address!=$address){
               $notes .= $addressType." address change <b>".display_placeholder_text($c_adress->address)."</b> to <b>".$address."</b><br>"; 
            }
            $city = $this->post('city');
            if($c_adress->city!=$city){
               $notes .= $addressType." address change <b>".display_placeholder_text($c_adress->city)."</b> to <b>".$city."</b><br>"; 
            }
            $tehsil = $this->post('tehsil');
            if($c_adress->tehsil!=$tehsil){
               $notes .= $addressType." address tehsil change <b>".display_placeholder_text($c_adress->tehsil)."</b> to <b>".$tehsil."</b><br>"; 
            }
            $district = $this->post('district');
            if($c_adress->district!=$district){
               $notes .= $addressType." address district change <b>".display_placeholder_text($c_adress->district)."</b> to <b>".$district."</b><br>"; 
            }
            $country = $this->post('country');
            if($c_adress->country!=$country){
               $notes .= $addressType." address country change <b>".display_placeholder_text($c_adress->country)."</b> to <b>".$country."</b><br>"; 
            }
            $state = $this->post('state');
            if($c_adress->state!=$state){
               $notes .= $addressType." address state change <b>".display_placeholder_text($c_adress->state)."</b> to <b>".$state."</b><br>"; 
            }
            $postName = $this->post('postName');
            if($c_adress->postName!=$postName){
               $notes .= $addressType." address postName change <b>".display_placeholder_text($c_adress->postName)."</b> to <b>".$postName."</b><br>"; 
            }
            	/*activity*/
            	            $add_meta['userId']         = $userId;
                $add_meta['zip_code']       = $this->post('zip_code');
                $add_meta['address']        = $this->post('address');
                $add_meta['city']           = $this->post('city');
                $add_meta['tehsil']         = $this->post('tehsil');
                $add_meta['district']       = $this->post('district');
                $add_meta['country']        = $this->post('country');
                $add_meta['state']          = $this->post('state');
                $add_meta['postName']       = $this->post('postName');
                $add_meta['addressType']    = $addressType;//'Permanent';
        
           
            $isExistH            =  $this->common_model->is_data_exists('addresses',array('addressType'=>$addressType,'userId'=>$userId));
          
            if($isExistH){

                $result = $this->common_model->updateFields('addresses',$add_meta,array('addressType'=>$addressType,'userId'=>$userId));
            }else{
                 $result =    $this->common_model->insertData('addresses',$add_meta);
            }
          
            if($result){
               // $this->common_model->activity_log($userId,"Application :Address Update Activity",$notes);
                $status = SUCCESS;
                $msg  = ResponseMessages::getStatusCodeMessage(123);
            }else{
                $status = FAIL;
                $msg  = ResponseMessages::getStatusCodeMessage(118);
            }
            if($result){
            	 $add            =  $this->common_model->is_data_exists('addresses',array('addressType'=>$addressType,'userId'=>$userId));
                 $response   = array('status'=>SUCCESS,'message'=>$msg,'data'=> $add);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
            }
          
    
        }
        $this->response($response);
    }//end function


    function user_edit_post(){
      	$authCheck  = $this->check_service_auth();
		$authToken  = $this->authData->authToken;
		$userId     = $this->authData->id;
        $this->form_validation->set_rules('firstName','first name', 'trim|required');
        $this->form_validation->set_rules('lastName','last name', 'trim|required');
        $this->form_validation->set_rules('parentName','parent name', 'trim|required');
        $this->form_validation->set_rules('familyHeadName','family head name', 'trim|required');
        $this->form_validation->set_rules('gender','gender', 'trim|required');
        $this->form_validation->set_rules('maritalStatus','maritalStatus', 'trim|required');
        $this->form_validation->set_rules('dob','dob', 'trim|required');
       
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
      
            $data_val['firstName']       = $this->post('firstName'); 
            $data_val['lastName']        = $this->post('lastName'); 
            $data_val['parentName']        = $this->post('parentName'); 
            $data_val['familyHeadName']        = $this->post('familyHeadName'); 
            $data_val['fullName']        = $this->post('firstName').' '.$this->post('lastName'); 
            $data_val['gender']        = $this->post('gender'); 
            $data_val['maritalStatus']        = $this->post('maritalStatus'); 
            $data_val['dob']             = date('Y-m-d',strtotime($this->post('dob'))); 
/*

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
            $user_meta['hindiFamilyHeadName']   = $this->post('hindiFamilyHeadName');*/
           // $user_meta['unionName']             = $this->post('unionName');
            $user_meta['otherUnionName']        = $this->post('otherSanghName');
            $user_meta['bloodGroup']            = @$this->post('bloodGroup');
            $unionName                          = $this->post('sanghId');
            $user_meta['unionName']             = $this->post('sanghId');
            $sangh                              = $this->common_model->is_data_exists('shree_sangh',array('sanghId'=>$unionName));
            if($sangh){
                $data_val['sanghId']            = $sangh->sanghId;
                $user_meta['unionName']         = $sangh->name;
            }


            $user_meta['religiousKnowledge']    = $this->post('dharmikgyan') ? implode(",",$this->post('dharmikgyan')) :"";
           
            $id     = $userId;
         
            $isExist            =  $this->common_model->is_data_exists('users',array('id'=>$id));
            if($isExist){
                    $result = $this->common_model->updateFields('users',$data_val,array('id'=>$id));
                    $this->common_model->updateFields('user_meta',$user_meta,array('userId'=>$id));
                    if($result){
                         
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
 
    
    function add_donation_post(){
        $authCheck  = $this->check_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('amount','amount', 'trim|required');
        $this->form_validation->set_rules('receiptName','receiptName', 'trim|required');
        $this->form_validation->set_rules('payName','payName', 'trim|required');
        $this->form_validation->set_rules('contactNumber','contactNumber', 'trim|required');
        $this->form_validation->set_rules('email','email', 'trim|required');
        $this->form_validation->set_rules('occasionId','occasion Id', 'trim|required');
        $this->form_validation->set_rules('helpforId','helpfor', 'trim|required');
        $this->form_validation->set_rules('isAnonymous','isAnonymous', 'trim|required');
        $this->form_validation->set_rules('feeds','feeds', 'trim|required');
        $this->form_validation->set_rules('txnId','txnId', 'trim|required');
        $this->form_validation->set_rules('paymentStatus','paymentStatus', 'trim|required');
      
       
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
      
            $data_val['userId']         = $userId; 
            $data_val['amount']         = $this->post('amount'); 
            $data_val['receiptName']    = $this->post('receiptName'); 
            $data_val['payName']        = $this->post('payName'); 
            $data_val['contactNumber']  = $this->post('contactNumber'); 
            $data_val['email']          = $this->post('email'); 
            $data_val['address']        = $this->post('address'); 
            $data_val['occasion']       = $this->post('occasionId'); 
            $data_val['helpfor']        = $this->post('helpforId'); 
            $data_val['isAnonymous']    = $this->post('isAnonymous'); 
            $data_val['feeds']          = $this->post('feeds'); 
            $data_val['paymentMode']    = $this->post('paymentMode'); 
            $data_val['txnId']          = $this->post('txnId'); 
            $data_val['paymentStatus']  = $this->post('paymentStatus'); 
            $data_val['message']        = $this->post('message'); 
         
            $result            =  $this->common_model->insertData('donation',$data_val);
           
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(123));
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
        }
        $this->response($response);
    }//end function
 
    
}//End Class 