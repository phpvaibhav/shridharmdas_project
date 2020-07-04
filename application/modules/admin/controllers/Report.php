<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
           error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->check_admin_user_session();
       
    }
    public function index(){
     
        $data['title']      = lang('reports');
       
	
		$data['front_scripts'] = array('');
        $this->load->admin_render('report/index', $data, '');
    } //End function
     public function gyan(){
        $id             = decoding($this->uri->segment(4));
        $id_gyan             = $this->uri->segment(4);
        
        $data['title']      = lang('reports');
       
    
        $data['front_scripts'] = array('');
        $data['id_gyan'] = $id_gyan;
        $data['front_scripts']  = array('backend_assets/custom/js/common_datatable.js');
        $this->load->admin_render('report/gyan', $data, '');
    } //End function
    function pgpdf(){
        $this->load->library('pdfgenerator');
         $id             = decoding($this->uri->segment(4));
        $id_gyan             = $this->uri->segment(4);
                        $this->load->model('adminapi/user_model');
        $sanghId=$_SESSION[ADMIN_USER_SESS_KEY]['sanghId'];
        $roleId=$_SESSION[ADMIN_USER_SESS_KEY]['roleId'];
        $gyan = $id;
       // pr($gyan);
        $where ="";
        if($roleId==4){
        $sanghId = $this->common_model->GetSingleJoinRecord('shree_sangh','sanghId','admin_sanghs','sanghId','GROUP_CONCAT(shree_sangh.sanghId) as sanghId',array('admin_sanghs.adminId'=>$userId))->sanghId;
        // pr($sanghIds);
        }
        $check = "religiousKnowledge  REGEXP '(^|,)($gyan)(,|$)'";
        $where = $sanghId ? $check." AND `u.is_deleted` =0 AND (`u.sanghId` IN ($sanghId))":$check." AND `u.is_deleted` =0";
        if(isset($_POST['length']) && $_POST['length'] < 1) {
            $_POST['length']= '10000000000';
        } else{
            $_POST['length']= isset($_POST['length']) ? $_POST['length'] :10000000000;
        }
        
        
        if(isset($_POST['start']) && $_POST['start'] > 1) {
            $_POST['start']= $_POST['start'];
        }
        $this->user_model->set_data($where);
        $users   = $this->user_model->get_list();
        // ----------------------------------------------------
     /*   $content = ''; 
        $content .= '<!DOCTYPE HTML><html lang="hi"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="keywords" content="Shree dharmdas,श्री धर्मदास गण परिषद"><meta name="description" content="Shree dharmdas,श्री धर्मदास गण परिषद"><title>Shree dharmdas</title>
       <style>@font-face {
    src: url("http://experimenting.in/css3/webfonts/hindifontsdemo/gargi.ttf")format("truetype");font-family: "gargi"; }body {
    font-family: gargi, dejvu sans, sans-serif}</style></head><body><table border="0" cellspacing="1" cellpadding="4">
        <tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
        <th>Full Name</th>
        <th>S/O|W/O</th>
        <th>Family Head Name</th>
        <th>Shree Shangh</th>
        <th>Religious knowledge</th>
        </tr>';
        if(!empty($users)){

     foreach ($users as $k => $serData) {
       if($k++%2 == 1){
          $colr = "background-color:#f1f1f1;";
        }else{
          $colr = "background-color:#fff;";
        }
        $id      = $k;
        $fullName      = display_placeholder_text($serData->hindiFullName); 
        $parentName      = display_placeholder_text($serData->hindiParentName); 
        $familyHeadName      = display_placeholder_text($serData->hindiFamilyHeadName); 
        $sanghName      = display_placeholder_text($serData->unionName).(!empty($serData->otherUnionName) ? ' ('.display_placeholder_text($serData->otherUnionName).')':""); 
        $religiousKnowledge      = display_placeholder_text(str_replace($gyan,"<b><a href='javascript:void(0);'>".$gyan."</a></b>",$serData->religiousKnowledge));          
        $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
        
            $content .= '<td>'.$fullName.'</td>';
            $content .= '<td>'.$parentName.'</td>';
            $content .= '<td>'.$familyHeadName.'</td>';  
            $content .= '<td>'.$sanghName.'</td>';  
            $content .= '<td>'.$religiousKnowledge.'</td>';  
        $content .='</tr>';
      }
        }else{
      $colr     = "background-color:#f1f1f1;";
      $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
        $content .='<td colspan="6" align="center">No user found.</td>';   
      $content .='</tr>';
    } 
    $content .='</table></body></html>';*/
    $dataA['users'] =$users;
    $dataA['gyan'] =$gyan;
//$html = utf8_decode($this->load->view('report/mypdf', $dataA, true));
$html = $this->load->view('report/mypdf', $dataA, true);
        
        $this->pdfgenerator->generate($html,'contoh');
       // $this->pdfgenerator->generate($content,'test');
    }
    function listpdf(){
        header('Content-Type: text/html; charset=UTF-8');
         $this->load->library('pdf');
        $id             = decoding($this->uri->segment(4));
        $id_gyan             = $this->uri->segment(4);
                        $this->load->model('adminapi/user_model');
        $sanghId=$_SESSION[ADMIN_USER_SESS_KEY]['sanghId'];
        $roleId=$_SESSION[ADMIN_USER_SESS_KEY]['roleId'];
        $gyan = $id;
        $where ="";
        if($roleId==4){
        $sanghId = $this->common_model->GetSingleJoinRecord('shree_sangh','sanghId','admin_sanghs','sanghId','GROUP_CONCAT(shree_sangh.sanghId) as sanghId',array('admin_sanghs.adminId'=>$userId))->sanghId;
        // pr($sanghIds);
        }
        $check = "religiousKnowledge  REGEXP '(^|,)($gyan)(,|$)'";
        $where = $sanghId ? $check." AND `u.is_deleted` =0 AND (`u.sanghId` IN ($sanghId))":$check." AND `u.is_deleted` =0";
        if(isset($_POST['length']) && $_POST['length'] < 1) {
            $_POST['length']= '10000000000';
        } else{
            $_POST['length']= isset($_POST['length']) ? $_POST['length'] :10000000000;
        }
        
        
        if(isset($_POST['start']) && $_POST['start'] > 1) {
            $_POST['start']= $_POST['start'];
        }
        $this->user_model->set_data($where);
        $users   = $this->user_model->get_list();
      //  pr( $users);
        ob_start();
        // create new PDF document
        $pdf  = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor(lang('site_name'));
        $pdf->SetTitle($id);
        $pdf->SetSubject(lang('site_name'));
        $pdf->SetKeywords(lang('site_name'));

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)

// MAKE ARRAY WITH UTF LANGUAGE IDENTIFIER
$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'ltr';
$lg['a_meta_language'] = 'HI'; // I think you can change this to HI or IN for hindi
$lg['w_page'] = 'page';

// CHANGE SETTINGS IN TCPDF
$pdf->setLanguageArray($lg);
       /* if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
        }*/
        // ---------------------------------------------------------
        // set font
        // Set font
       
        $pdf->SetFont('freeserif', 'N', 10);
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        // add a page
        $pdf->AddPage();
        // print a line
        $pdf->Cell(0, 14,$id,0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Ln(5);
        $pdf->Write(0, 'Date: '.date('d/m/Y') , '', 0, 'L', false, 0, true, false, 0);
        // Logged in username
        $userName = $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];
        $pdf->Write(0, 'By: '.$userName, '', 0, 'R', true, 0, false, false, 0);
        $pdf->Ln(5);   
        $pdf->SetFont('freeserif', '', 9,false);
        // ----------------------------------------------------
        $content = ''; 
        $content .= '<table border="0" cellspacing="1" cellpadding="4">
        <tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
        <th>Full Name</th>
        <th>S/O|W/O</th>
        <th>Family Head Name</th>
        <th>Shree Shangh</th>
        <th>Religious knowledge</th>
        </tr>';
        if(!empty($users)){

     foreach ($users as $k => $serData) {
       if($k++%2 == 1){
          $colr = "background-color:#f1f1f1;";
        }else{
          $colr = "background-color:#fff;";
        }
        $id      = $k;
        $fullName      = display_placeholder_text($serData->hindiFullName); 
        $parentName      = display_placeholder_text($serData->hindiParentName); 
        $familyHeadName      = display_placeholder_text($serData->hindiFamilyHeadName); 
        $sanghName      = display_placeholder_text($serData->unionName).(!empty($serData->otherUnionName) ? ' ('.display_placeholder_text($serData->otherUnionName).')':""); 
        $religiousKnowledge      = display_placeholder_text(str_replace($gyan,"<b><a href='javascript:void(0);'>".$gyan."</a></b>",$serData->religiousKnowledge));          
        $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
          /*  $content .= '<td>'.$id.'</td>';*/
            $content .= '<td>'.$fullName.'</td>';
            $content .= '<td>'.$parentName.'</td>';
            $content .= '<td>'.$familyHeadName.'</td>';  
            $content .= '<td>'.$sanghName.'</td>';  
            $content .= '<td>'.$religiousKnowledge.'</td>';  
        $content .='</tr>';
      }
        }else{
      $colr     = "background-color:#f1f1f1;";
      $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
        $content .='<td colspan="6" align="center">No user found.</td>';   
      $content .='</tr>';
    } 
    $content .='</table>';
    $pdf->WriteHTML($content, true, false, true, false, '');
   // $pdf->writeHTML($content, true, false, true, false, '');
    // reset pointer to the last page
    $pdf->lastPage();
    $fileName = "gan-".strtotime(date("Y-m-d H:i:s")).".pdf";
    $pdf->Output($fileName, 'I');
    ob_end_flush();
    }//End function
    
  
    
}//End Class