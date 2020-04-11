<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	    function __construct() {
        parent::__construct();
       error_reporting(E_ALL);
	ini_set('display_errors', 1);
}
	public function index()
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

		//$res['r0'] .= '<option value="'.$row[0].'">'.$row[0].'</option>';

		$res['r1'] .= '<option value="'.$row[1].'">'.$row[1].'</option>';

		//$res['r2'] = $row[2];

		$res['r3'] = $row[3];

		$res['r4'] = $row[4];

		$res['r5'] = $row[5];
		}
		}
		fclose($fp);  
		}
		else
		{
		echo 'Record Not found.';
		}
		}

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
->set_output(json_encode(array("res0"=>$res0, "res1"=>$res1, "res2"=>$res2, "res3"=>$res3, "res4"=>$res4, "res5"=>$res5, "resx"=>$resx)));
}


}
