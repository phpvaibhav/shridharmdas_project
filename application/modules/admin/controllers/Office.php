<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Office extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Office');
		$count              = $this->common_model->get_total_count('offices');
		$count              = number_format_short($count);
		$data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Office').'<span class="txt-color-blue"><a class="anchor-btn" onclick="openAction();" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('Office').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-building"></i>&nbsp;'.$count.'</span></h5></li>');
          $data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/office.js');
        $this->load->admin_render('office/index', $data, '');
    } //End function
}//End Class