<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Users extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
         error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = lang('Users');
            $count              = $this->common_model->get_total_count('users');
        $data['countuser']  = $count ;   
        $count              = number_format_short($count);
        $data['recordSet']  = array('<li class="sparks-info"><h5>'.lang('Users').'<span class="txt-color-blue"><a href="'.base_url('add-user').'" class="anchor-btn"><i class="fa fa-plus-square"></i></a></span></h5></li>','<li class="sparks-info"><h5>'.lang('Total').' '.lang('Users').'<span class="txt-color-darken" id="totalCust"><i class="fa fa-lg fa-fw fa fa-users"></i>&nbsp;'.$count.'</span></h5></li>');
        $data['front_scripts'] = array('backend_assets/custom/js/common_datatable.js','backend_assets/custom/js/users.js');
        $this->load->admin_render('users/index', $data, '');
    } //End function
    public function add(){
     
        $data['title']      = lang('Users');
     	$countries      = $this->common_model->getAll('countries');
        $data['front_scripts'] = array('backend_assets/custom/js/users.js');
        $data['countries'] = $countries;
        $this->load->admin_render('users/add', $data, '');
    } //End function 
    public function detail(){
     
        $data['title']          = lang('Users');
        $userId                 = decoding($this->uri->segment(2));
        $where                  = array('id'=>$userId);
        $result                 = $this->common_model->getsingle('users',$where);
        $data['info']           = $result;
        $data['addresses']        = $this->common_model->getAll('addresses',array('userId'=>$result['id']));
        $data['usermeta']        = $this->common_model->getsingle('user_meta',array('userId'=>$result['id']));
        $countries      = $this->common_model->getAll('countries');
        $data['front_scripts'] = array('backend_assets/custom/js/users.js');
        $data['countries'] = $countries;
        $this->load->admin_render('users/detail', $data, '');
    } //End function
    function exportUser(){
        $extension = $this->input->post('export_type');
        if(!empty($extension)){
            $extension = $extension;
        } else {
            $extension = 'xlsx';
        }
        $this->load->helper('download');  
        $data = array();
        $data['title'] = lang('Users_List');;
        // get employee list
        $empInfo = $this->common_model->getAll('users','','id','desc');
        $fileName = 'shridharmdas-gan-'.time(); 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('E')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);
$sheet->getColumnDimension('H')->setAutoSize(true);
$sheet->getColumnDimension('I')->setAutoSize(true);
 $sheet->getStyle('A1:I1')->applyFromArray($styleArray);
$sheet->getStyle('A1:I1')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A:I')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('A1', 'First Name');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Parent Name');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Contact Number');
        $sheet->setCellValue('F1', 'Aadhar Number');
        $sheet->setCellValue('G1', 'DOB');
        $sheet->setCellValue('H1', 'Gender');
        $sheet->setCellValue('I1', 'Marital Status');

        $rowCount = 2;
        foreach ($empInfo as $element) {
              $usermeta        = $this->common_model->getsingle('user_meta',array('userId'=>$element->id));
        $sheet->setCellValue('A' . $rowCount, display_placeholder_text($element->firstName));
        $sheet->setCellValue('B' . $rowCount, display_placeholder_text($element->lastName));
        $sheet->setCellValue('C' . $rowCount, display_placeholder_text($element->parentName));
        $sheet->setCellValue('D' . $rowCount, display_placeholder_text($element->email));
        $sheet->setCellValue('E' . $rowCount, display_mobile_text($element->contactNumber));
        $sheet->setCellValue('F' . $rowCount, display_aadhar_text($element->aadharNumber));
        $sheet->setCellValue('G' . $rowCount, display_placeholder_text(date('d-m-Y',strtotime($element->dob))));
        $sheet->setCellValue('H' . $rowCount, display_placeholder_text($element->gender));
        $sheet->setCellValue('I' . $rowCount, display_placeholder_text($element->maritalStatus));
        $rowCount++;
        }

        if($extension == 'csv'){          
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
        $fileName = $fileName.'.csv';
        } elseif($extension == 'xlsx') {
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $fileName = $fileName.'.xlsx';
        } else {
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
        $fileName = $fileName.'.xls';
        }

        $this->output->set_header('Content-Type: application/vnd.ms-excel');
        $this->output->set_header("Content-type: application/csv");
        $this->output->set_header('Cache-Control: max-age=0');
        $writer->save(ROOT_UPLOAD_PATH.$fileName); 
        //redirect(HTTP_UPLOAD_PATH.$fileName); 
        $filepath = file_get_contents(ROOT_UPLOAD_PATH.$fileName);
        force_download($fileName, $filepath);
    }//End Function
}//End Class