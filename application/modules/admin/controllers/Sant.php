<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sant extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index() {  
      
    $data['title']      = lang('sant_satee');
    $count              = $this->common_model->get_total_count('sant_maharaj');
    $count              = number_format_short($count);
    $data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('sant_satee').'<span class="txt-color-blue"><a class="anchor-btn" onclick="openAction();" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('sant_satee').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sun-o"></i>&nbsp;'.$count.'</span></h5></li>');
   /* '<li class="sparks-info"><h5>'.lang('PDF').'<span class="txt-color-blue"><a class="anchor-btn" href="#" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>',*/
    $data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/sant.js');
        $this->load->admin_render('sant/index', $data, '');
  } //End function

     public function detail(){
        $id             = decoding($this->uri->segment(4));
        //$id             = $this->uri->segment(4);
        
        $data['title']      = lang('sant_satee');
        $where                  = array('santId'=>$id);
        $result                 = $this->common_model->getsingle('sant_maharaj',$where);
        $data['info']           = $result;
        $where_s = "santId IN (".(!empty($result['shishya'])?$result['shishya']:0).")";
        $data['shishya']           = $this->common_model->getAll('sant_maharaj',$where_s);
        $data['con_list']           = $this->common_model->getAll('sant_maharaj_contact',$where);
        $data['shishyaList']           = $this->common_model->getAll('sant_maharaj',array('santId !='=>$id));
    
        $data['front_scripts'] = array('backend_assets/custom/js/giolocation.js','backend_assets/custom/js/sant.js');
       
        $this->load->admin_render('sant/detail', $data, '');
    } //End function
}//End Class