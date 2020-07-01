<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Report extends Common_Admin_Controller{
    
    public function __construct(){
        parent::__construct();
         error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    function list_post(){
        $this->load->helper('text');
        $this->load->model('user_model');
        $sanghId=$_SESSION[ADMIN_USER_SESS_KEY]['sanghId'];
        $roleId=$_SESSION[ADMIN_USER_SESS_KEY]['roleId'];
        $gyan = decoding($this->post('id'));
        $where ="";
        if($roleId==4){
            $sanghId = $this->common_model->GetSingleJoinRecord('shree_sangh','sanghId','admin_sanghs','sanghId','GROUP_CONCAT(shree_sangh.sanghId) as sanghId',array('admin_sanghs.adminId'=>$userId))->sanghId;
       // pr($sanghIds);
        }
        $check = "religiousKnowledge  REGEXP '(^|,)($gyan)(,|$)'"; //"`religiousKnowledge` REGEXP '[[:<:]]($gyan)[[:>:]]'";
        $where = $sanghId ? $check." AND `u.is_deleted` =0 AND (`u.sanghId` IN ($sanghId))":$check." AND `u.is_deleted` =0";
        
         
       

        $this->user_model->set_data($where);
        
        $list   = $this->user_model->get_list();
        
        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $serData) { 
            $action = '';
            $no++;
            $row        = array();
            $link_url   = base_url().($roleId==1?'user-detail/':'sangh-user-detail/').encoding($serData->id);
            $row[]      = $no;
            $row[]      = '<a href="'.$link_url.'" >'.display_placeholder_text($serData->hindiFullName).'</a>'; 
            $row[]      = display_placeholder_text($serData->hindiParentName); 
            $row[]      = display_placeholder_text($serData->hindiFamilyHeadName); 
            $row[]      = display_placeholder_text($serData->unionName).(!empty($serData->otherUnionName) ? ' ('.display_placeholder_text($serData->otherUnionName).')':""); 
         //   $row[]      = display_placeholder_text($serData->contactNumber); 
            $row[]      = display_placeholder_text(str_replace($gyan,"<b><a href='javascript:void(0);'>".$gyan."</a></b>",$serData->religiousKnowledge)); 
          
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
            switch ($serData->verifyUser) {
             
                case 1:
                   $row[] = '<label class="label label-success">'.$serData->verifyShow.'</label>';
                    break;
                case 0:
                   $row[] = '<label class="label label-warning">'.$serData->verifyShow.'</label>';
                    break;
                
                default:
                      $row[] = '<label class="label label-warning">'.$serData->verifyShow.'</label>';
                    break;
            }
       
            $link      ='javascript:void(0)';
            $action .= "";
 

            $row[]  = $action;
            $data[] = $row;

        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->user_model->count_all(),
            "recordsFiltered"   => $this->user_model->count_filtered(),
            "data"              => $data,
        );
        //output to json format
        $this->response($output);
    }
}//End Class 