<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Union extends Common_Admin_Controller{
    
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
            $about  = $this->post('about'); 
            $id     = decoding($this->post('id'));
            $data_val['name']   = $name;
            $data_val['about']  = $about;
            $isExist            =  $this->common_model->is_data_exists('union_group',array('unionId'=>$id));
            if($isExist){
                 $result = $this->common_model->updateFields('union_group',$data_val,array('uniond'=>$id));
                 $msg = ResponseMessages::getStatusCodeMessage(123);
            }else{
                 $result = $this->common_model->insertData('union_group',$data_val);
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
        $this->load->model('union_model');
        $this->union_model->set_data();
        $list   = $this->union_model->get_list();
        
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

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->sanghId).'" data-url="adminapi/union/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->sanghId).'" data-url="adminapi/union/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Edit"><i class="fa fa-edit" data-id="'.encoding($serData->sanghId).'" data-name="'.$serData->name.'" data-about="'.$serData->about.'"   onclick="editAction(this);"  aria-hidden="true"></i></a>';
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->sanghId).'" data-url="adminapi/union/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->union_model->count_all(),
            "recordsFiltered"   => $this->union_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $sanghId            = decoding($this->post('id'));
        $where              = array('sanghId'=>$sanghId);
        $dataExist          = $this->common_model->is_data_exists('shree_sangh',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $dataExist      = $this->common_model->updateFields('shree_sangh',array('status'=>$status),$where);
            $showmsg        = ($status==1)? lang("Active") : lang("Inactive");
            $response       = array('status'=>SUCCESS,'message'=>$showmsg." ".ResponseMessages::getStatusCodeMessage(128));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordDelete_post(){
        $sanghId        = decoding($this->post('id'));
        $where          = array('sanghId'=>$sanghId);
        $dataExist      = $this->common_model->is_data_exists('shree_sangh',$where);
        if($dataExist){
            $dataExist  = $this->common_model->deleteData('shree_sangh',$where);
            $response   = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response  = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
}//End Class 