<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Donation extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_admin_service_auth();
    }
    public function list_post(){
        $this->load->helper('text');
        $this->load->model('donation_model');
        $this->donation_model->set_data();
        $list = $this->donation_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
       
        $row[] = display_placeholder_text($serData->amount); 
        $row[] = display_placeholder_text($serData->receiptName); 
        $row[] = display_placeholder_text($serData->payName); 
        $row[] = display_placeholder_text($serData->contactNumber); 
        $row[] = display_placeholder_text($serData->paymentMode); 

       
        if($serData->status){
        $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>'; 
        } 
            $link  ='javascript:void(0)';
            $action .= "";

      /*  $link = base_url().'vehicles/vehicleDetail/'.encoding($serData->vehicleId);
        $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>';*/
        

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->donation_model->count_all(),
            "recordsFiltered" => $this->donation_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 

}//End Class 

