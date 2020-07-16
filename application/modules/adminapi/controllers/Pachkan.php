<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Pachkan extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
     function add_post(){
        $authCheck  = $this->check_admin_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('name','name', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            $name   = $this->post('name'); 
            
            $about  = @$this->post('description'); 
            $id     = decoding($this->post('id'));
            $data_val['name']   = $name;
            $data_val['description']  = $about;
                                // profile pic upload
                    $this->load->model('Image_model');

                    $image          = array(); $audioFile = '';
                    if (!empty($_FILES['audioFile']['name'])) {
                        $folder     = 'pachkan';
                        $image      = $this->Image_model->updateDocument('audioFile',$folder); //upload media of Seller
                        //check for error
                        if(array_key_exists("error",$image) && !empty($image['error'])){
                            $response = array('status' => FAIL, 'message' => strip_tags($image['error'].'(In audio file)'));
                           $this->response($response);die;
                        }
                        //check for image name if present
                        if(array_key_exists("image_name",$image)):
                            $audioFile = $image['image_name'];
                            if(!empty($isExist->file)){
                                $this->Image_model->delete_image('uploads/pachkan/',$isExist->file);
                            }
                        endif;
                        }
                        if(!empty($audioFile)){
                            $data_val['file']           =   $audioFile;
                        } 
                    //update
            $isExist            =  $this->common_model->is_data_exists('pachkan',array('pachkanId'=>$id));
            if($isExist){
                 $isExistN            =  $this->common_model->is_data_exists('pachkan',array('pachkanId !='=>$id,'name'=>$name));
                 if($isExistN){
                     $result = 1;
                     $status = FAIL;
                     $msg = 'Namr already exist';
                 }else{
                    $result = $this->common_model->updateFields('pachkan',$data_val,array('pachkanId'=>$id));
                    $status = SUCCESS;
                    $msg = ResponseMessages::getStatusCodeMessage(123);
                 }
                
            }else{
                $isExistN            =  $this->common_model->is_data_exists('pachkan',array('name'=>$name));
                 if($isExistN){
                     $result = 1;
                     $status = FAIL;
                      $msg = 'Namr already exist';
                 }else{
                    $result = $this->common_model->insertData('pachkan',$data_val);
                    $status = SUCCESS;
                    $msg  = ResponseMessages::getStatusCodeMessage(122);
                }
            }
            if($result){
                 $response   = array('status'=>$status,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }    
        }
        $this->response($response);
    }//end function
    function list_post(){
        $roleId=$_SESSION[ADMIN_USER_SESS_KEY]['roleId'];
        $permission             = $this->common_model->getsingle('permission',array('roleId'=>$roleId));
        $u_set  = isset($permission['pachkan']) ? json_decode($permission['pachkan'],true) :array();
        $u_view = isset($u_set['view'])? $u_set['view']:0;
        $u_add = isset($u_set['add'])? $u_set['add']:0;
        $u_edit = isset($u_set['edit'])? $u_set['edit']:0;
        $u_delete = isset($u_set['delete'])? $u_set['delete']:0;
        $this->load->helper('text');
        $this->load->model('pachkan_model');
        $this->pachkan_model->set_data();
        $list   = $this->pachkan_model->get_list();
        $data   = array();        

        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $row[]      = $no;
           
            $row[]      = display_placeholder_text($serData->name);    
            $row[]      = display_placeholder_text($serData->description);    
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
            if($roleId==1):
           if($serData->status){

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->pachkanId).'" data-url="adminapi/pachkan/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->pachkanId).'" data-url="adminapi/pachkan/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->pachkanId).'" data-url="adminapi/pachkan/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
             $e_url      = base_url().'admin/pachkan/edit/'.encoding($serData->pachkanId);
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$e_url.'"  class="on-default edit-row table_action" title="Edit"><i class="fa fa-edit"  aria-hidden="true"></i></a>';
            
        else:
            //Permission
            if($u_edit){
                if($serData->status){

                    $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->pachkanId).'" data-url="adminapi/pachkan/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
                }else{
                    $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->pachkanId).'" data-url="adminapi/pachkan/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
                }
                 $e_url      = base_url().'admin/pachkan/edit/'.encoding($serData->pachkanId);
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$e_url.'"  class="on-default edit-row table_action" title="Edit"><i class="fa fa-edit"  aria-hidden="true"></i></a>';
            }
          
            if($u_delete){
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->pachkanId).'" data-url="adminapi/pachkan/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            
            }
            //Permission
        endif;
        if(!empty($serData->file)):
                $a_url   = base_url().'uploads/pachkan/'.$serData->file;
                $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a target="_blank" href="'.$a_url.'" class="on-default edit-row table_action" title="Sound"><i class="fa fa-volume-up" aria-hidden="true"></i></a>';
            endif;
            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->pachkan_model->count_all(),
            "recordsFiltered"   => $this->pachkan_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $pachkanId            = decoding($this->post('id'));
        $where              = array('pachkanId'=>$pachkanId);
        $dataExist          = $this->common_model->is_data_exists('pachkan',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $dataExist      = $this->common_model->updateFields('pachkan',array('status'=>$status),$where);
            $showmsg        = ($status==1)? lang("Active") : lang("Inactive");
            $response       = array('status'=>SUCCESS,'message'=>$showmsg." ".ResponseMessages::getStatusCodeMessage(128));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordDelete_post(){
        $pachkanId         = decoding($this->post('id'));
        $where              = array('pachkanId'=>$pachkanId);
        $dataExist          = $this->common_model->is_data_exists('pachkan',$where);
        if($dataExist){
            $dataExist      = $this->common_model->deleteData('pachkan',$where);
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response  = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
}//End Class 