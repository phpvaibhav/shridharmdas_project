<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Pages extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->check_admin_service_auth();
    }
    public function addPage_post(){
       $pageId  = decoding($this->post('pageId'));
    
      
        $this->form_validation->set_rules('description', 'description', 'trim|required'); 
        if(!empty($pageId)){
            $this->form_validation->set_rules('title', 'title', 'trim|required');
        }else{
            $this->form_validation->set_rules('title', 'title', 'trim|required|is_unique[pages.title]',
            array('is_unique' => 'title already exist'));
            $this->form_validation->set_rules('pageUrl', 'page type', 'trim|required|is_unique[pages.pageUrl]',
            array('is_unique' => 'page already exist'));
        }
      
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            
        }else{
                $pageId                         = decoding($this->post('pageId'));
                $showMenu                       = $this->post('showMenu');
                $title                          = $this->post('title');
                $pageUrl                        = $this->post('pageUrl');
                $data_val['title']              = $title;
                $data_val['pageUrl']            = $this->post('pageUrl');;
                $data_val['subTitle']           = @$this->post('subTitle');
                $data_val['description']        = @$this->post('description');
                $data_val['icon']               = @$this->post('icon');
                $data_val['metaTitle']          = @$this->post('metaTitle');
                $data_val['metaKeyword']        = @$this->post('metaKeyword');
                $data_val['metaDescription']    = @$this->post('metaDescription');
                $data_val['showMenu']           = $showMenu ? $showMenu :0;
                
				$where = array('pageId'=>$pageId);
            	$isExist=$this->common_model->is_data_exists('pages',$where);
            	if($isExist){
                    $isTitle = $this->common_model->is_data_exists('pages',array('title'=>$title,'pageId !='=>$pageId));
                    if(!$isTitle){
                        $isUrl = $this->common_model->is_data_exists('pages',array('pageUrl'=>$pageUrl,'pageId !='=>$pageId));
                        if(!$isUrl){
                        $result = $this->common_model->updateFields('pages',$data_val,$where);
                        $status = SUCCESS;
                        $msg = "Page record updated successfully."; 
                        }else{
                            $result = 1;
                            $status = FAIL;
                            $msg = "Page already exist."; 
                        }
                    }else{
                         $result = 1;
                          $status = FAIL;
                          $msg = "Title already exist."; 
                    }
            		
            	}else{
            		$result = $this->common_model->insertData('pages',$data_val);
            		 $status = SUCCESS;
            		$msg = "Page record added successfully.";
            	}
                
                if($result){
                  
                     $response = array('status'=>$status,'message'=>$msg);
                }else{
                     $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
                } 
        }
        $this->response($response);
    }//end function 

    public function pageList_post(){
        $this->load->helper('text');
        $this->load->model('page_model');
        $this->page_model->set_data();
        $list = $this->page_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        //$row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->title); 
        $row[] = display_placeholder_text($serData->subTitle); 

       
        if($serData->status){
        $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>'; 
        } 
            $link  ='javascript:void(0)';
            $action .= "";
      /*  if($serData->status){

            $action .= '<a href="'.$link.'" onclick="pageStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->pageId).'"  class="btn btn-danger btn-circle" title="status"><i class="fa fa-check" aria-hidden="true"></i></a>';
        }else{
             $action .= '<a href="'.$link.'" onclick="pageStatus(this);" data-message="You want to change status!" data-useid="'.encoding($serData->pageId).'"  class="btn btn-success btn-circle" title="status"><i class="fa fa-times" aria-hidden="true"></i></a>';
        }
        $detailUrl = base_url().'admin/pages/addPage/'.encoding($serData->pageId);
             $action .= '&nbsp;<a href="'.$detailUrl.'"  data-pageId="'.encoding($serData->pageId).'"  class="btn btn-primary btn-circle" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>';
             
              $action .= '&nbsp;<a href="'.$link.'" onclick="pageDelete(this);" data-message="You want to delete this page!" data-useid="'.encoding($serData->pageId).'"  class="btn btn-warning btn-circle" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';*/
                if($serData->status){

                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->pageId).'" data-url="adminapi/pages/pageStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-check" aria-hidden="true"></i></a>';
                }else{
                $action .= '<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to change status!" data-id="'.encoding($serData->pageId).'" data-url="adminapi/pages/pageStatus" data-list="1"  class="on-default edit-row table_action" title="Status"><i class="fa fa-times" aria-hidden="true"></i></a>';
                }
               
                $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'" onclick="confirmAction(this);" data-message="You want to delete this record!" data-id="'.encoding($serData->pageId).'" data-url="adminapi/pages/pageDelete" data-list="1"  class="on-default edit-row table_action" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                 $detailUrl = base_url().'admin/pages/addPage/'.encoding($serData->pageId);
                $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$detailUrl.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye"  aria-hidden="true"></i></a>';
      /*  $link = base_url().'vehicles/vehicleDetail/'.encoding($serData->vehicleId);
        $action .= '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.$link.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>';*/
        

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->page_model->count_all(),
            "recordsFiltered" => $this->page_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    }//end function 
    function pageStatus_post(){
        $pageId  = decoding($this->post('id'));
    
        $where = array('pageId'=>$pageId);
         $dataExist=$this->common_model->is_data_exists('pages',$where);
        if($dataExist){
            $status = $dataExist->status ?0:1;

             $dataExist=$this->common_model->updateFields('pages',array('status'=>$status),$where);
              $showmsg  =($status==1)? "Page request is Active" : "Page request is Inactive";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
 	function pageDelete_post(){
        $pageId  = decoding($this->post('id'));
   
        $where = array('pageId'=>$pageId);
         $dataExist=$this->common_model->is_data_exists('pages',$where);
        if($dataExist){
              
             $dataExist=$this->common_model->deleteData('pages',$where);
              $showmsg  ='record has been deleted successfully.';
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
}//End Class 

