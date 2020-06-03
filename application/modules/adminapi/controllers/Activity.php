<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Activity extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    function list_post(){
        $this->load->helper('text');
        $this->load->model('activity_model');
        $this->activity_model->set_data();
        $list   = $this->activity_model->get_list();
        $data   = array();        

        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $row[]      = $no;
            $row[]      = display_placeholder_text($serData->adminName)." (".display_placeholder_text($serData->role).")";    
            $row[]      = display_placeholder_text($serData->userName);    
            $row[]      = display_placeholder_text($serData->type);    
            $row[]      = time_elapsed_string($serData->crd);    
            $link      ='javascript:void(0)';
            $action .= "";

            $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->activityId).'" data-url="adminapi/activity/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->activity_model->count_all(),
            "recordsFiltered"   => $this->activity_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $activityId            = decoding($this->post('id'));
        $where              = array('activityId'=>$activityId);
        $dataExist          = $this->common_model->is_data_exists('activity_log',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $dataExist      = $this->common_model->updateFields('activity_log',array('status'=>$status),$where);
            $showmsg        = ($status==1)? lang("Active") : lang("Inactive");
            $response       = array('status'=>SUCCESS,'message'=>$showmsg." ".ResponseMessages::getStatusCodeMessage(128));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordDelete_post(){
        $activityId        = decoding($this->post('id'));
        $where          = array('activityId'=>$activityId);
        $dataExist      = $this->common_model->is_data_exists('activity_log',$where);
        if($dataExist){
            $dataExist  = $this->common_model->deleteData('activity_log',$where);
            $response   = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response  = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
}//End Class 