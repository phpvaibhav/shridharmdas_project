<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Permissions extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Permissions');
         $data['rolesList'] = $this->common_model->getAll('admin_role',array('rolestatus'=>1,'roleId !='=>1),'roleId','ASC');
        $this->load->admin_render('extra/index', $data, '');
    } //End function
    public function detail(){
     
        $id             = decoding($this->uri->segment(2));
        $data['title']      = lang('Permissions');
        $where              = array('roleId'=>$id);
        $result             = $this->common_model->getsingle('admin_role',$where);
        $permission             = $this->common_model->getsingle('permission',$where);
        $data['role']   = $result;
        $data['info']   = $permission;

        $data['front_scripts'] = array('backend_assets/custom/js/permission.js');
        $this->load->admin_render('extra/detail', $data, '');
    } //End function
  
    
}//End Class