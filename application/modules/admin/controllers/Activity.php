<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Activity_Log');
        $count              = $this->common_model->get_total_count('activity_log');
        $count              = number_format_short($count);
        $data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Total').' '.lang('Activity_Log').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');

	
		$data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/activity.js');
        $this->load->admin_render('activity/index', $data, '');
    } //End function
  
    
}//End Class