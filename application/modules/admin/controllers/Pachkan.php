<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pachkan extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
    $data['title']      = lang('pachkan');
		$count              = $this->common_model->get_total_count('pachkan');
		$count              = number_format_short($count);
		$data['recordSet']  = array('<li class="sparks-info"><h5>Pachkan<span class="txt-color-blue"><a href="'.base_url('admin/pachkan/add').'"  class="anchor-btn" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>Pachkan<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');

		$data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/pachkan.js');
        $this->load->admin_render('pachkan/index', $data, '');
    } //End function

    public function add(){
      $data['title']      = lang('pachkan');
      $data['front_scripts'] = array('backend_assets/custom/js/pachkan.js');
      $this->load->admin_render('pachkan/add', $data, '');
    } //End function

    public function edit(){
      $pachkanId             = decoding($this->uri->segment(4));
     
      $where              = array('pachkanId'=>$pachkanId);
      $result             = $this->common_model->getsingle('pachkan',$where);
      $data['title']      = lang('pachkan');
      $data['pachkan']      = $result;
      $data['front_scripts'] = array('backend_assets/custom/js/pachkan.js');
      $this->load->admin_render('pachkan/add', $data, '');
    } //End function
    
    

    
}//End Class