<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Donationtype extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    function add_post(){
        $authCheck  = $this->check_admin_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('name',lang('Name'), 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            $name   = $this->post('name'); 
           
            $type  = @$this->post('type'); 
            $id     = decoding($this->post('id'));
            $data_val['name']   = $name;
            $data_val['donationType']   = $type;
            
            $isExist            =  $this->common_model->is_data_exists('donationtype',array('typeId'=>$id));
            if($isExist){
                 $isExistN            =  $this->common_model->is_data_exists('donationtype',array('typeId !='=>$id,'name'=>$name));
                 if($isExistN){
                     $result = 1;
                     $status = FAIL;
                     $msg = ResponseMessages::getStatusCodeMessage(129);
                 }else{
                    $result = $this->common_model->updateFields('donationtype',$data_val,array('typeId'=>$id));
                    $status = SUCCESS;
                    $msg = ResponseMessages::getStatusCodeMessage(123);
                 }
                
            }else{
                $isExistN            =  $this->common_model->is_data_exists('donationtype',array('name'=>$name));
                 if($isExistN){
                     $result = 1;
                     $status = FAIL;
                     $msg = ResponseMessages::getStatusCodeMessage(129);
                 }else{
                    $result = $this->common_model->insertData('donationtype',$data_val);
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
        $this->load->helper('text');
        $this->load->model('donationtype_model');
        $id = $this->post('id');
        $where = array('donationType' => $id);
        $this->donationtype_model->set_data($where);
        $list   = $this->donationtype_model->get_list();
        $data   = array();        

        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $row[]      = $no;
            $row[]      = display_placeholder_text($serData->name); 
         /*   $row[]      = display_placeholder_text((mb_substr($serData->about, 0,100, 'UTF-8') .((strlen($serData->about) >100) ? '...' : ''))); */
         
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

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->typeId).'" data-url="adminapi/donationtype/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->typeId).'" data-url="adminapi/donationtype/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Edit"><i class="fa fa-edit" data-id="'.encoding($serData->typeId).'" data-name="'.$serData->name.'"    onclick="editAction(this);"  aria-hidden="true"></i></a>';
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->typeId).'" data-url="adminapi/donationtype/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->donationtype_model->count_all(),
            "recordsFiltered"   => $this->donationtype_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $typeId            = decoding($this->post('id'));
        $where              = array('typeId'=>$typeId);
        $dataExist          = $this->common_model->is_data_exists('donationtype',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $dataExist      = $this->common_model->updateFields('donationtype',array('status'=>$status),$where);
            $showmsg        = ($status==1)? lang("Active") : lang("Inactive");
            $response       = array('status'=>SUCCESS,'message'=>$showmsg." ".ResponseMessages::getStatusCodeMessage(128));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordDelete_post(){
        $typeId        = decoding($this->post('id'));
        $where          = array('typeId'=>$typeId);
        $dataExist      = $this->common_model->is_data_exists('donationtype',$where);
        if($dataExist){
            $dataExist  = $this->common_model->deleteData('donationtype',$where);
            $response   = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response  = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
}//End Class 