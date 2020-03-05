<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Union extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
  /*  public function index(){
     
        $data['title']      = lang('Union');
		$count              = $this->common_model->get_total_count('union_group');
		$count              = number_format_short($count);
		$data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Union').'<span class="txt-color-blue"><a class="anchor-btn" onclick="openAction();" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('Union').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');
	/*	,'<li class="sparks-info"><h5>'.lang('PDF').'<span class="txt-color-blue"><a class="anchor-btn" href="#" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>',*/
	//	$data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/preceptor.js');
        //$this->load->admin_render('union/index', $data, '');
   // } //End function*/
     public function index(){
     
        $data['title']      = lang('Office');
        $this->load->admin_render('office/index', $data, '');
    } //End function
}//End Class