<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Users');
            $count              = $this->common_model->get_total_count('users');
        $count              = number_format_short($count);
        $data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Users').'<span class="txt-color-blue"><a href="'.base_url('add-user').'" class="anchor-btn"><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('Users').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-users"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/users.js');
        $this->load->admin_render('users/index', $data, '');
    } //End function
    public function add(){
     
        $data['title']      = lang('Users');
     	$countries      = $this->common_model->getAll('countries');
        $data['front_scripts'] = array('backend_assets/custom/js/users.js');
        $data['countries'] = $countries;
        $this->load->admin_render('users/add', $data, '');
    } //End function 
    public function detail(){
     
        $data['title']          = lang('Users');
        $userId                 = decoding($this->uri->segment(2));
        $where                  = array('id'=>$userId);
        $result                 = $this->common_model->getsingle('users',$where);
        $data['info']           = $result;
        $data['addresses']        = $this->common_model->getAll('addresses',array('userId'=>$result['id']));
        $data['usermeta']        = $this->common_model->getsingle('user_meta',array('userId'=>$result['id']));
        $data['front_scripts']  = array('backend_assets/admin/js/location.js','backend_assets/custom/js/users.js');

        $this->load->admin_render('users/detail', $data, '');
    } //End function
}//End Class