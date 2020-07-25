<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Sant extends Common_Admin_Controller{
    
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
            $name               = $this->post('name'); 
            $about              = $this->post('about'); 
            $id                 = decoding($this->post('id'));
            $data_val['name']   = $name;
            $data_val['about']  = $about;
            $isExist            =  $this->common_model->is_data_exists('sant_maharaj',array('santId'=>$id));
            if($isExist){
                $result        = $this->common_model->updateFields('sant_maharaj',$data_val,array('santId'=>$id));
                $msg           = ResponseMessages::getStatusCodeMessage(123);
            }else{
                $result        = $this->common_model->insertData('sant_maharaj',$data_val);
                $msg            = ResponseMessages::getStatusCodeMessage(122);
            }
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }     
        }
        $this->response($response);
    }//end function

    function addSant_post(){
        $authCheck  = $this->check_admin_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('id','id', 'trim|required');
         $this->form_validation->set_rules('santIdM[]', 'sant name', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            $santIdM                        =  $this->post('santIdM');
            $id                 = decoding($this->post('id'));
            $data_val['shishya']   = !empty($santIdM)? implode(",",$santIdM):"";
            
            $isExist            =  $this->common_model->is_data_exists('sant_maharaj',array('santId'=>$id));
            if($isExist){
                $result        = $this->common_model->updateFields('sant_maharaj',$data_val,array('santId'=>$id));
                $msg           = ResponseMessages::getStatusCodeMessage(123);
            }else{
                $result        = 0;
                
            }
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }     
        }
        $this->response($response);
    }//end function


    function address_post(){
        $authCheck  = $this->check_admin_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('id','id', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            //pr($this->post());
            $id                     = decoding($this->post('id'));
            $data_val['address']    = $this->post('address');
            $data_val['latitude']   = $this->post('latitude');
            $data_val['longitude']  = $this->post('longitude');
            $data_val['street']     = $this->post('street');
            $data_val['street2']    = $this->post('street2');
            $data_val['city']       = $this->post('city');
            $data_val['state']      = $this->post('state');
            $data_val['zip']        = $this->post('zip');
            $data_val['country']    = $this->post('country');
            
            $isExist                = $this->common_model->is_data_exists('sant_maharaj',array('santId'=>$id));
            if($isExist){
                $result             = $this->common_model->updateFields('sant_maharaj',$data_val,array('santId'=>$id));
                $msg                = ResponseMessages::getStatusCodeMessage(123);
            }else{
                $result        = 0;
                
            }
            if($result){
                 $response   = array('status'=>SUCCESS,'message'=>$msg);
            }else{
                 $response   = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }     
        }
        $this->response($response);
    }//end function


    function addSantContact_post(){
        $authCheck  = $this->check_admin_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('id','id', 'trim|required');
        $this->form_validation->set_rules('contactName','contact name', 'trim|required');
        $this->form_validation->set_rules('contactNumber','contact number', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));  
        }else{
            //pr($this->post());
            $id                     = decoding($this->post('id'));
            $data_val['santId']     = $id;
            $data_val['name']       = $this->post('contactName');
            $data_val['contact']    = $this->post('contactNumber');
            $data_val['address']    = $this->post('address');
            $data_val['latitude']   = $this->post('latitude');
            $data_val['longitude']  = $this->post('longitude');
            $data_val['street']     = $this->post('street');
            $data_val['street2']    = $this->post('street2');
            $data_val['city']       = $this->post('city');
            $data_val['state']      = $this->post('state');
            $data_val['zip']        = $this->post('zip');
            $data_val['country']    = $this->post('country');
            
            $isExist                = $this->common_model->is_data_exists('sant_maharaj',array('santId'=>$id));
            if($isExist){
                $result             = $this->common_model->insertData('sant_maharaj_contact',$data_val);
                $msg                = ResponseMessages::getStatusCodeMessage(123);
            }else{
                $result        = 0;
                
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
        $this->load->model('sant_model');
        $this->sant_model->set_data();
        $list   = $this->sant_model->get_list();
        
        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $row[]      = $no;
            $row[]      = display_placeholder_text($serData->name); 
            $row[]      = display_placeholder_text((mb_substr($serData->about, 0,100, 'UTF-8') .((strlen($serData->about) >100) ? '...' : ''))); 
         
            switch ($serData->status) {
             
                case 1:
                   $row[] =  '<label class="label label-success">'.$serData->statusShow.'</label>';
                    break;
                case 0:
                   $row[] =  '<label class="label label-warning">'.$serData->statusShow.'</label>';
                    break;
                
                default:
                      $row[] = '<label class="label label-warning">'.$serData->statusShow.'</label>';
                    break;
            }
       
            $link      = 'javascript:void(0);';
            $action .= "";
           if($serData->status){

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->santId).'" data-url="adminapi/sant/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->santId).'" data-url="adminapi/sant/activeInactiveStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Edit"><i class="fa fa-edit" data-id="'.encoding($serData->santId).'" data-name="'.$serData->name.'" data-about="'.$serData->about.'"   onclick="editAction(this);"  aria-hidden="true"></i></a>';
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->santId).'" data-url="adminapi/sant/recordDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            $link_url      = base_url().'admin/sant/detail/'.encoding($serData->santId);
            $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link_url.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye"  aria-hidden="true"></i></a>';

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->sant_model->count_all(),
            "recordsFiltered"   => $this->sant_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
    function activeInactiveStatus_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('santId'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('sant_maharaj',$where);
        if($dataExist){
            $status         = $dataExist->status ? 0:1;
            $dataExist      = $this->common_model->updateFields('sant_maharaj',array('status'=>$status),$where);
            $showmsg        = ($status==1) ? lang("Active") : lang("Inactive");
            $response       = array('status'=>SUCCESS,'message'=>$showmsg." ".ResponseMessages::getStatusCodeMessage(128));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function recordDelete_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('santId'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('sant_maharaj',$where);
        if($dataExist){
            $this->common_model->deleteData('sant_maharaj',$where);
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);

    }//end function    
    function recordDelete_1_post(){
        $preId              = decoding($this->post('id'));
        $where              = array('contactId'=>$preId);
        $dataExist          = $this->common_model->is_data_exists('sant_maharaj_contact',$where);
        if($dataExist){
            $this->common_model->deleteData('sant_maharaj_contact',$where);
            $response       = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(124));
        }else{
            $response       = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
        
    }//end function
}//End Class 