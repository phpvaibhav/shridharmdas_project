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
$sheet->getColumnDimension('J')->setAutoSize(true);
$sheet->getColumnDimension('K')->setAutoSize(true);
$sheet->getColumnDimension('L')->setAutoSize(true);
$sheet->getColumnDimension('M')->setAutoSize(true);
$sheet->getColumnDimension('N')->setAutoSize(true);
$sheet->getColumnDimension('O')->setAutoSize(true);
$sheet->getColumnDimension('P')->setAutoSize(true);

$sheet->getColumnDimension('Q')->setAutoSize(true);
$sheet->getColumnDimension('R')->setAutoSize(true);
$sheet->getColumnDimension('S')->setAutoSize(true);
$sheet->getColumnDimension('T')->setAutoSize(true);
$sheet->getColumnDimension('U')->setAutoSize(true);
$sheet->getColumnDimension('V')->setAutoSize(true);
$sheet->getColumnDimension('W')->setAutoSize(true);
$sheet->getColumnDimension('X')->setAutoSize(true);
$sheet->getColumnDimension('Y')->setAutoSize(true);
$sheet->getColumnDimension('Z')->setAutoSize(true);
$sheet->getColumnDimension('AA')->setAutoSize(true);
$sheet->getColumnDimension('AB')->setAutoSize(true);
$sheet->getColumnDimension('AC')->setAutoSize(true);
$sheet->getColumnDimension('AD')->setAutoSize(true);

$sheet->getStyle('A1:AD1')->applyFromArray($styleArray);
$sheet->getStyle('A1:AD1')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A:AD')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('A1', 'First Name');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Parent Name');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Contact Number');
        $sheet->setCellValue('F1', 'Aadhar Number');
        $sheet->setCellValue('G1', 'DOB');
        $sheet->setCellValue('H1', 'Gender');
        $sheet->setCellValue('I1', 'Marital Status');
        
        $sheet->setCellValue('J1', 'Education');
        $sheet->setCellValue('K1', 'Profession');
        $sheet->setCellValue('L1', 'Blood Group');
        $sheet->setCellValue('M1', 'Parivaar Guru Aamana');
        $sheet->setCellValue('N1', 'Shree Sangh');
        $sheet->setCellValue('O1', 'Dhaarmik Gyaan');
        $sheet->setCellValue('P1', 'Gan / Sangathan / Sangh / Mandal Mein Daayitv');

        $sheet->setCellValue('Q1', 'Home Address');
        $sheet->setCellValue('R1', 'City');
        $sheet->setCellValue('S1', 'Zip code');
        $sheet->setCellValue('T1', 'Tehsil');
        $sheet->setCellValue('U1', 'District');
        $sheet->setCellValue('V1', 'State');
        $sheet->setCellValue('W1', 'Country');

        $sheet->setCellValue('X1', 'Office Address');
        $sheet->setCellValue('Y1', 'City');
        $sheet->setCellValue('Z1', 'Zip code');
        $sheet->setCellValue('AA1', 'Tehsil');
        $sheet->setCellValue('AB1', 'District');
        $sheet->setCellValue('AC1', 'State');
        $sheet->setCellValue('AD1', 'Country');
        

        $rowCount = 2;
        foreach ($empInfo as $element) {
              $usermeta        = $this->common_model->getsingle('user_meta',array('userId'=>$element->id));
               $addresses        = $this->common_model->getAll('addresses',array('userId'=>$element->id));
             // pr($usermeta);
        $sheet->setCellValue('A' . $rowCount, display_placeholder_text($element->firstName));
        $sheet->setCellValue('B' . $rowCount, display_placeholder_text($element->lastName));
        $sheet->setCellValue('C' . $rowCount, display_placeholder_text($element->parentName));
        $sheet->setCellValue('D' . $rowCount, display_placeholder_text($element->email));
        $sheet->setCellValue('E' . $rowCount, display_mobile_text($element->contactNumber));
        $sheet->setCellValue('F' . $rowCount, display_aadhar_text($element->aadharNumber));
        $sheet->setCellValue('G' . $rowCount, display_placeholder_text(date('d-m-Y',strtotime($element->dob))));
        $sheet->setCellValue('H' . $rowCount, display_placeholder_text($element->gender));
        $sheet->setCellValue('I' . $rowCount, display_placeholder_text($element->maritalStatus));
        $sheet->setCellValue('J' . $rowCount, display_placeholder_text(@$usermeta['education']));
        $sheet->setCellValue('K' . $rowCount, display_placeholder_text(@$usermeta['profession']));
        $sheet->setCellValue('L' . $rowCount, display_placeholder_text(@$usermeta['bloodGroup']));
        $sheet->setCellValue('M' . $rowCount, display_placeholder_text(@$usermeta['preceptorName']));
        $sheet->setCellValue('N' . $rowCount, display_placeholder_text(@$usermeta['unionName']));
        $sheet->setCellValue('O' . $rowCount, display_placeholder_text(@$usermeta['religiousKnowledge']));
        $sheet->setCellValue('P' . $rowCount, display_placeholder_text(@$usermeta['unionResponsibility']));

        $sheet->setCellValue('Q' . $rowCount, display_placeholder_text(@$addresses[0]->address));
        $sheet->setCellValue('R' . $rowCount, display_placeholder_text(@$addresses[0]->city));
        $sheet->setCellValue('S' . $rowCount, display_placeholder_text(@$addresses[0]->zip_code));
        $sheet->setCellValue('T' . $rowCount, display_placeholder_text(@$addresses[0]->tehsil));
        $sheet->setCellValue('U' . $rowCount, display_placeholder_text(@$addresses[0]->district));
        $sheet->setCellValue('V' . $rowCount, display_placeholder_text(@$addresses[0]->state));
        $sheet->setCellValue('W' . $rowCount, display_placeholder_text(@$addresses[0]->country));

        $sheet->setCellValue('X' . $rowCount, display_placeholder_text(@$addresses[1]->address));
        $sheet->setCellValue('Y' . $rowCount, display_placeholder_text(@$addresses[1]->city));
        $sheet->setCellValue('Z' . $rowCount, display_placeholder_text(@$addresses[1]->zip_code));
        $sheet->setCellValue('AA' . $rowCount, display_placeholder_text(@$addresses[1]->tehsil));
        $sheet->setCellValue('AB' . $rowCount, display_placeholder_text(@$addresses[1]->district));
        $sheet->setCellValue('AC' . $rowCount, display_placeholder_text(@$addresses[1]->state));
        $sheet->setCellValue('AD' . $rowCount, display_placeholder_text(@$addresses[1]->country));
        
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
        //unlink(FCPATH.'/'.ROOT_UPLOAD_PATH.$fileName);
    }//End Function
}//End Class