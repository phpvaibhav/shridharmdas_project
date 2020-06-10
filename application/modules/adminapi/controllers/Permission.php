<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Permission extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    function add_post(){
        $authCheck  = $this->check_admin_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('roleId','role', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
          
            $roleId     = decoding($this->post('roleId')); 

            $p_view     = $this->post('p_view'); 
            $p_add      = $this->post('p_add'); 
            $p_edit     = $this->post('p_edit'); 
            $p_delete   = $this->post('p_delete'); 
            $profile    = array(
                'view'          => isset($p_view) ? $p_view:0,
                'add'           => isset($p_add) ? $p_add:0,
                'edit'          => isset($p_edit) ? $p_edit:0,
                'delete'        => isset($p_delete) ? $p_delete:0
            );
            $ps_view        = $this->post('ps_view'); 
            $ps_add         = $this->post('ps_add'); 
            $ps_edit        = $this->post('ps_edit'); 
            $ps_delete      = $this->post('ps_delete'); 
            $password  = array(
                'view'      => isset($ps_view) ? $ps_view:0,
                'add'       => isset($ps_add) ? $ps_add:0,
                'edit'      => isset($ps_edit) ? $ps_edit:0,
                'delete'    => isset($ps_delete) ? $ps_delete:0
            );
            $u_list                 = $this->post('u_list'); 
            $u_view                 = $this->post('u_view'); 
            $u_add                  = $this->post('u_add'); 
            $u_edit                 = $this->post('u_edit'); 
            $u_delete               = $this->post('u_delete'); 
            $u_export               = $this->post('u_export'); 
            $u_contactNumber        = $this->post('u_contactNumber'); 
            $u_current_address      = $this->post('u_current_address'); 
            $u_permanent_address    = $this->post('u_permanent_address'); 
            $users  = array(
                'list'              => isset($u_list) ? $u_list:0,
                'view'              => isset($u_view) ? $u_view:0,
                'add'               => isset($u_add) ? $u_add:0,
                'edit'              => isset($u_edit) ? $u_edit:0,
                'delete'            => isset($u_delete) ? $u_delete:0,
                'export'            => isset($u_export) ? $u_export:0,
                'contactNumber'     => isset($u_contactNumber) ? $u_contactNumber:0,
                'current_address'   => isset($u_current_address) ? $u_current_address:0,
                'permanent_address' => isset($u_permanent_address) ? $u_permanent_address:0,
            );
            $data_val = array('profile'=>json_encode($profile),
                'password'=>json_encode($password),
                'users'=>json_encode($users)
            );
              //pr($data_val);
            $id     = decoding($this->post('id'));
          
            $isExist            =  $this->common_model->is_data_exists('permission',array('preId'=>$id,'roleId'=>$roleId));
            if($isExist){
                
                    $result = $this->common_model->updateFields('permission',$data_val,array('preId'=>$id,'roleId'=>$roleId));
                    $status = SUCCESS;
                    $msg = ResponseMessages::getStatusCodeMessage(123);
                
            }else{
                    $data_val['roleId'] = $roleId;
                    $result = $this->common_model->insertData('permission',$data_val);
                    $status = SUCCESS;
                    $msg  = ResponseMessages::getStatusCodeMessage(122);
                
            }
            if($result){
                 $response   = array('status'=>$status,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
        }
        $this->response($response);
    }//end function
 

}//End Class 