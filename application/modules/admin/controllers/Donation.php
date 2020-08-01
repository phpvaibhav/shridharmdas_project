<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
     
    }

  
    public function index() { 
        
        $data['title'] = lang('donation');
        $d              = $this->common_model->getsingle('donation','','SUM(amount) as total');
        $count              = $this->common_model->get_total_count('donation');
		$count              = number_format_short($count);
        $total              = number_format($d['total'],2);
		$data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Total').' '.lang('donation').'<span class="txt-color-blue"><i class="fa fa-lg fa-fw fa fa-rupe"></i>&nbsp;'.$total.'</span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('donation_list').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_styles']    = array();
         $data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/donation.js');
        $this->load->admin_render('donation/index', $data);
    } 
    public function donation_chance() { 
        
        $data['title']      = lang('donation_chance');
        $count              = $this->common_model->get_total_count('donationtype',array('donationType'=>'BY'));
		$count              = number_format_short($count);
		$data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('donation_chance').'<span class="txt-color-blue"><a class="anchor-btn" onclick="openAction();" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('donation_chance').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');
		$data['type'] = 'BY';
        $data['front_styles']    = array();
        $data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/donation.js');
        $this->load->admin_render('donation/typelist', $data);
    } 
    public function donation_for() { 
        
        $data['title']      = lang('donation_for');
        $count              = $this->common_model->get_total_count('donationtype',array('donationType'=>'FOR'));
		$count              = number_format_short($count);
		$data['type']       = 'FOR';
		$data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('donation').'<span class="txt-color-blue"><a class="anchor-btn" onclick="openAction();" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('donation_for').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_styles']   = array();
        $data['front_scripts']  = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/donation.js');
        $this->load->admin_render('donation/typelist', $data);
    } 
  
}