<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Union extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Union');
		$count              = $this->common_model->get_total_count('shree_sangh');
		$count              = number_format_short($count);
		$data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Union').'<span class="txt-color-blue"><a class="anchor-btn" onclick="openAction();" ><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('Union').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-sitemap"></i>&nbsp;'.$count.'</span></h5></li>');
	/*	,'<li class="sparks-info"><h5>'.lang('PDF').'<span class="txt-color-blue"><a class="anchor-btn" href="#" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>',*/
		$data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/preceptor.js');
        $this->load->admin_render('union/index', $data, '');
    } //End function
    function shree_sanghlist(){
        
        $this->load->helper('country_code_helper');
        $unions = unionList();
        $data_val =array();
        $i=0;
        foreach ($unions as $key => $value) {
           $data_val[$i]['name'] =  $value;
           $i++;
        }
        pr($data_val);
        if(!empty($data_val)){
           $result = $this->common_model->insertBatch('shree_sangh',$data_val);
        }
       
    }
    function shree_userlist(){
        $data_val           = array();
       // $user = $this->common_model->getAll('users',);
        $empInfo = $this->common_model->GetJoinRecord('users','id','user_meta','userId',"*",'','','id','desc');
        //unionName
        $i=0;
        foreach ($empInfo as $key => $value) {
         
         $userId             = $value->id;
         $unionName          = trim($value->unionName);
    
          $isExist            = $this->common_model->is_data_exists('shree_sangh',array('name'=>$unionName));

          if($isExist){
           $status = $this->common_model->updateFields('users',array('sanghId'=>$isExist->sanghId),array('id'=>$userId)); 
            $data_val[$i]=$status;
          }
         $i++;
        }
        pr($data_val);
      /*  if(!empty($data_val)){
           /// $result = $this->common_model->insertBatch('shree_sangh',$data_val);
        }*/
       
    }
    
}//End Class