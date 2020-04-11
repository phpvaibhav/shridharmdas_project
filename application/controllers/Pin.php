<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();

        error_reporting(0);
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$res = array();
		$this->load->view('pincode',$res);
	}

	public function pincodeajax()
	{
		$res = array();

		$fileName = base_url().'frontend_assets/updated_pincode_sheet.csv';

  		if($this->input->post())
  		{
  			$search = $this->input->post('pinCode');
  			if (($fp = fopen("$fileName", "r")) !== false)
   			{
    			while (($row = fgetcsv($fp)) !== false)
       			{
		           	if($row[2] === $search)
		           	{

           				//$res0 .= '<option value="'.$row[0].'">'.$row[0].'</option>';

           				$res1 .= '<option value="'.$row[1].'">'.$row[1].'</option>';

           				//$res2 = $row[2];

		           		$res3 = $row[3];

		           		$res4 = $row[4];

		           		$res5 = $row[5];
           			}
       			}
       			fclose($fp);  
   			}
   			else
			{
   				$resx = 'Record Not found.';
			}
		}
     
   		$this->output->set_content_type('application/json')
			->set_output(json_encode(array("res1"=>$res1, "res3"=>$res3, "res4"=>$res4, "res5"=>$res5 )));
	}


}
