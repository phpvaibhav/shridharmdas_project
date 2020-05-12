<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Adminrole extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    function add_post(){
          $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]',
            array('is_unique' => 'Email already exist')
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]');
      // $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('fullName', 'full Name', 'trim|required|min_length[2]');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            $email                          =  $this->post('email');
            $fullName                       =  $this->post('fullName');
            $roleId                             =  $this->post('roleId');
            $sanghId                       =  $this->post('sanghId');
            $password                       =  $this->post('password');
            $data_val['fullName']           =  $fullName; 
            $data_val['email']              =  $email; 
            $data_val['sanghId']            =  $sanghId; 
            $data_val['roleId']             =  $roleId; 

            $data_val['password']           =  password_hash($password, PASSWORD_DEFAULT);
            $id                             =  decoding($this->post('id'));
         
            $isExist                        =  $this->common_model->is_data_exists('admin',array('id'=>$id) );
            if($isExist){
                  $result                   = $this->common_model->updateFields('admin',$data_val,array('id'=>$id));
                   $msg                 = ResponseMessages::getStatusCodeMessage(123);
                
            }else{
                 $result = $this->common_model->insertData('admin',$data_val);
             
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
        $this->load->model('adminrole_model');
        $where =array('ar.roleId !='=>1);
        $this->adminrole_model->set_data($where);
        //lq();
        $list   = $this->adminrole_model->get_list();
        
        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $link_url   = base_url().'sub-admin-detail/'.encoding($serData->id);
            $row[]      = $no;
            $row[]      = '<a href="'.$link_url.'" >'.display_placeholder_text($serData->fullName).'</a>'; 
            $row[]      = display_placeholder_text($serData->email); 
            $row[]      = display_placeholder_text($serData->role); 
            $row[]      = display_placeholder_text($serData->sanghName); 

          
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
           
       
            $link      ='javascript:void(0)';
            $action .= "";
           if($serData->status){

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->id).'" data-url="adminapi/adminrole/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->id).'" data-url="adminapi/adminrole/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            $link_url      = base_url().'sub-admin-detail/'.encoding($serData->id);
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link_url.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye"  aria-hidden="true"></i></a>';
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->id).'" data-url="adminapi/adminrole/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->adminrole_model->count_all(),
            "recordsFiltered"   => $this->adminrole_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('id'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('admin',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $up      = $this->common_model->updateFields('admin',array('status'=>$status),$where);
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
        $dataExist          = $this->common_model->is_data_exists('admin',$where);
        if($dataExist){
            $dataExist      = $this->common_model->deleteData('admin',$where);
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


}//End Class 