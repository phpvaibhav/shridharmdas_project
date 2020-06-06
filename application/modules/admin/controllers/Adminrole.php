<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminrole extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->check_admin_user_session();
    }         
    public function index(){
     
        $data['title']      = lang('Sub_Admin');
        $count          = $this->common_model->get_total_count('admin',array('roleId !='=>1));
        $data['countuser']  = $count ;   
        $count              = number_format_short($count);
        $data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Sub_Admin').'<span class="txt-color-blue"><a  href="'.base_url('sub-admin-add').'" class="anchor-btn" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('Sub_Admin').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-users"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_scripts']  = array('backend_assets/custom/js/common_datatable.js');
        $this->load->admin_render('adminrole/index', $data, '');

    } //End function
     public function add(){
     
        $data['title']      = 'Add';
        $data['unionList']  = $this->common_model->getAll('shree_sangh',array('status'=>1),'name','ASC');
        $data['rolesList']  = $this->common_model->getAll('admin_role',array('rolestatus'=>1,'roleId !='=>1),'roleId','ASC');
        $data['front_scripts']  = array('backend_assets/custom/js/adminrole.js');

        $this->load->admin_render('adminrole/add', $data, '');

    } //End function
    
    public function detail(){
     
        $userId             = decoding($this->uri->segment(2));
        $data['title']      = lang('Sub_Admin');
        $where              = array('id'=>$userId);
        $result             = $this->common_model->getsingle('admin',$where);
        $data['userData']   = $result;
        $this->load->admin_render('adminrole/detail', $data, '');

    } //End function
    

}//End Class