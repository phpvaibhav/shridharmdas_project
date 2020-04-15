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
     
        $data['front_scripts'] = array('backend_assets/custom/js/users.js');
      
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
      
        $data['front_scripts'] = array('backend_assets/custom/js/users.js');
        $this->load->admin_render('users/detail', $data, '');
    } //End function
    function exportUser(){
        $extension = $this->input->post('export_type');
        $lang_type = $this->input->post('lang_type');
        if(!empty($extension)){
            $extension = $extension;
        } else {
            $extension = 'xlsx';
        }
        if(!empty($lang_type)){
            $lang_type = $lang_type;
        } else {
            $lang_type = 'Actual';
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
        $sheet->getColumnDimension('AE')->setAutoSize(true);

        $sheet->getColumnDimension('AF')->setAutoSize(true);
        $sheet->getColumnDimension('AG')->setAutoSize(true);
        $sheet->getColumnDimension('AH')->setAutoSize(true);
        $sheet->getColumnDimension('AI')->setAutoSize(true);
        $sheet->getColumnDimension('AJ')->setAutoSize(true);
        $sheet->getColumnDimension('AK')->setAutoSize(true);
        $sheet->getColumnDimension('AL')->setAutoSize(true);
        $sheet->getColumnDimension('AM')->setAutoSize(true);
        $sheet->getColumnDimension('AN')->setAutoSize(true);
        $sheet->getColumnDimension('AO')->setAutoSize(true);
        $sheet->getColumnDimension('AP')->setAutoSize(true);
        $sheet->getColumnDimension('AQ')->setAutoSize(true);
        $sheet->getColumnDimension('AR')->setAutoSize(true);

        $sheet->getStyle('A1:AR1')->applyFromArray($styleArray);
        $sheet->getStyle('A1:AR1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A:AR')->getAlignment()->setHorizontal('center');
        if($lang_type=='Hindi'){
            $sheet->setCellValue('A1', 'नाम');
            $sheet->setCellValue('B1', 'उपनाम');
            $sheet->setCellValue('C1', 'पिता/पति का नाम');
            $sheet->setCellValue('D1', 'परिवार के मुखिया का नाम');
            $sheet->setCellValue('E1', 'ई-मेल');
            $sheet->setCellValue('F1', 'फ़ोन नंबर');
            $sheet->setCellValue('G1', 'आधार कार्ड नंबर');
            $sheet->setCellValue('H1', 'जन्म की तारीख');
            $sheet->setCellValue('I1', 'लिंग');
            $sheet->setCellValue('J1', 'वैवाहिक स्थिति');

            $sheet->setCellValue('K1', 'शिक्षा');
            $sheet->setCellValue('L1', 'व्यवसाय');
            $sheet->setCellValue('M1', 'रक्त समूह');
            $sheet->setCellValue('N1', 'परिवार गुरु आमना');
            $sheet->setCellValue('O1', 'श्री संघ');
            $sheet->setCellValue('P1', 'धार्मिक ज्ञान');
            $sheet->setCellValue('Q1', 'गण/संघठन/संघ/मंडल में दायित्व');

            $sheet->setCellValue('R1', 'वर्तमान घर का पता');
            $sheet->setCellValue('S1', 'मुहल्ला / गाँव');
            $sheet->setCellValue('T1', 'पोस्ट नाम');
            $sheet->setCellValue('U1', 'शहर');
            $sheet->setCellValue('V1', 'पिन कोड');
            $sheet->setCellValue('W1', 'तहसील');
            $sheet->setCellValue('X1', 'जिला');
            $sheet->setCellValue('Y1', 'राज्य');
            $sheet->setCellValue('Z1', 'देश');

            $sheet->setCellValue('AA1', 'स्थायी घर का पता');
            $sheet->setCellValue('AB1', 'मुहल्ला / गाँव');
            $sheet->setCellValue('AC1', 'पोस्ट नाम');
            $sheet->setCellValue('AD1', 'शहर');
            $sheet->setCellValue('AE1', 'पिन कोड');
            $sheet->setCellValue('AF1', 'तहसील');
            $sheet->setCellValue('AG1', 'जिला');
            $sheet->setCellValue('AH1', 'राज्य');
            $sheet->setCellValue('AI1', 'देश');

            $sheet->setCellValue('AJ1', 'कार्यालय का पता');
            $sheet->setCellValue('AK1', 'मुहल्ला / गाँव');
            $sheet->setCellValue('AL1', 'पोस्ट नाम');
            $sheet->setCellValue('AM1', 'शहर');
            $sheet->setCellValue('AN1', 'पिन कोड');
            $sheet->setCellValue('AO1', 'तहसील');
            $sheet->setCellValue('AP1', 'जिला');
            $sheet->setCellValue('AQ1', 'राज्य');
            $sheet->setCellValue('AR1', 'देश');
        }else{
            $sheet->setCellValue('A1', 'First Name');
            $sheet->setCellValue('B1', 'Last Name');
            $sheet->setCellValue('C1', 'Parent Name');
            $sheet->setCellValue('D1', 'Family Head');
            $sheet->setCellValue('E1', 'Email');
            $sheet->setCellValue('F1', 'Contact Number');
            $sheet->setCellValue('G1', 'Aadhar Number');
            $sheet->setCellValue('H1', 'DOB');
            $sheet->setCellValue('I1', 'Gender');
            $sheet->setCellValue('J1', 'Marital Status');

            $sheet->setCellValue('K1', 'Education');
            $sheet->setCellValue('L1', 'Profession');
            $sheet->setCellValue('M1', 'Blood Group');
            $sheet->setCellValue('N1', 'Parivaar Guru Aamana');
            $sheet->setCellValue('O1', 'Shree Sangh');
            $sheet->setCellValue('P1', 'Dhaarmik Gyaan');
            $sheet->setCellValue('Q1', 'Gan / Sangathan / Sangh / Mandal Mein Daayitv');

            $sheet->setCellValue('R1', 'Current Address');
            $sheet->setCellValue('S1', 'locality');
            $sheet->setCellValue('T1', 'postName');
            $sheet->setCellValue('U1', 'City');
            $sheet->setCellValue('V1', 'Zip code');
            $sheet->setCellValue('W1', 'Tehsil');
            $sheet->setCellValue('X1', 'District');
            $sheet->setCellValue('Y1', 'State');
            $sheet->setCellValue('Z1', 'Country');

            $sheet->setCellValue('AA1', 'Permanent Address');
            $sheet->setCellValue('AB1', 'locality');
            $sheet->setCellValue('AC1', 'postName');
            $sheet->setCellValue('AD1', 'City');
            $sheet->setCellValue('AE1', 'Zip code');
            $sheet->setCellValue('AF1', 'Tehsil');
            $sheet->setCellValue('AG1', 'District');
            $sheet->setCellValue('AH1', 'State');
            $sheet->setCellValue('AI1', 'Country');

            $sheet->setCellValue('AJ1', 'Office Address');
            $sheet->setCellValue('AK1', 'locality');
            $sheet->setCellValue('AL1', 'postName');
            $sheet->setCellValue('AM1', 'City');
            $sheet->setCellValue('AN1', 'Zip code');
            $sheet->setCellValue('AO1', 'Tehsil');
            $sheet->setCellValue('AP1', 'District');
            $sheet->setCellValue('AQ1', 'State');
            $sheet->setCellValue('AR1', 'Country');
        }

        

        $rowCount = 2;
        foreach ($empInfo as $element) {

            $usermeta        = $this->common_model->getsingle('user_meta',array('userId'=>$element->id));
            $addresses        = $this->common_model->getAll('addresses',array('userId'=>$element->id));
            switch ($lang_type) {
                case 'Hindi':
                    $firstName       = @$usermeta['hindiFirstName'];
                    $lastName        = @$usermeta['hindiLastName'];
                    $parentName      = @$usermeta['hindiParentName'];
                    $familyHeadName  = @$usermeta['hindiFamilyHeadName'];
                    break;
                case 'English':
                    $firstName       = $element->firstName;
                    $lastName        = $element->lastName;
                    $parentName      = $element->parentName;
                    $familyHeadName  = $element->familyHeadName;
                    break;
                case 'Actual':
                    $firstName       = @$usermeta['actualFirstName'];
                    $lastName        = @$usermeta['actualLastName'];
                    $parentName      = @$usermeta['actualParentName'];
                    $familyHeadName  = @$usermeta['actualFamilyHeadName'];
                    break;
                default:
                    $firstName       = @$usermeta['actualFirstName'];
                    $lastName        = @$usermeta['actualLastName'];
                    $parentName      = @$usermeta['actualParentName'];
                    $familyHeadName  = @$usermeta['actualFamilyHeadName'];
                    break;
            }
        // pr($usermeta);
        $sheet->setCellValue('A' . $rowCount, display_placeholder_text($firstName));
        $sheet->setCellValue('B' . $rowCount, display_placeholder_text($lastName));
        $sheet->setCellValue('C' . $rowCount, display_placeholder_text($parentName));
        $sheet->setCellValue('D' . $rowCount, display_placeholder_text($familyHeadName));
        $sheet->setCellValue('E' . $rowCount, display_placeholder_text($element->email));
        $sheet->setCellValue('F' . $rowCount, display_mobile_text($element->contactNumber).'('.$element->whose_contact_number.')');
        $sheet->setCellValue('G' . $rowCount, display_aadhar_text($element->aadharNumber));
        $sheet->setCellValue('H' . $rowCount, display_placeholder_text(date('d-m-Y',strtotime($element->dob))));
        $sheet->setCellValue('I' . $rowCount, display_placeholder_text($element->gender));
        $sheet->setCellValue('J' . $rowCount, display_placeholder_text($element->maritalStatus));
        $sheet->setCellValue('K' . $rowCount, display_placeholder_text(@$usermeta['education']));
        $sheet->setCellValue('L' . $rowCount, display_placeholder_text(@$usermeta['profession']));
        $sheet->setCellValue('M' . $rowCount, display_placeholder_text(@$usermeta['bloodGroup']));
        $sheet->setCellValue('N' . $rowCount, display_placeholder_text(@$usermeta['preceptorName']));
        $sheet->setCellValue('O' . $rowCount, display_placeholder_text(@$usermeta['unionName']));
        $sheet->setCellValue('P' . $rowCount, display_placeholder_text(@$usermeta['religiousKnowledge']));
        $sheet->setCellValue('Q' . $rowCount, display_placeholder_text(@$usermeta['unionResponsibility']));

        $sheet->setCellValue('R' . $rowCount, display_placeholder_text(@$addresses[0]->address));
        $sheet->setCellValue('S' . $rowCount, display_placeholder_text(@$addresses[0]->city));
        $sheet->setCellValue('T' . $rowCount, display_placeholder_text(@$addresses[0]->locality));
        $sheet->setCellValue('U' . $rowCount, display_placeholder_text(@$addresses[0]->postName));
        $sheet->setCellValue('V' . $rowCount, display_placeholder_text(@$addresses[0]->zip_code));
        $sheet->setCellValue('W' . $rowCount, display_placeholder_text(@$addresses[0]->tehsil));
        $sheet->setCellValue('X' . $rowCount, display_placeholder_text(@$addresses[0]->district));
        $sheet->setCellValue('Y' . $rowCount, display_placeholder_text(@$addresses[0]->state));
        $sheet->setCellValue('Z' . $rowCount, display_placeholder_text(@$addresses[0]->country));

        $sheet->setCellValue('AA' . $rowCount, display_placeholder_text(@$addresses[1]->address));
        $sheet->setCellValue('AB' . $rowCount, display_placeholder_text(@$addresses[1]->locality));
        $sheet->setCellValue('AC' . $rowCount, display_placeholder_text(@$addresses[1]->postName));
        $sheet->setCellValue('AD' . $rowCount, display_placeholder_text(@$addresses[1]->city));
        $sheet->setCellValue('AE' . $rowCount, display_placeholder_text(@$addresses[1]->zip_code));
        $sheet->setCellValue('AF' . $rowCount, display_placeholder_text(@$addresses[1]->tehsil));
        $sheet->setCellValue('AG' . $rowCount, display_placeholder_text(@$addresses[1]->district));
        $sheet->setCellValue('AH' . $rowCount, display_placeholder_text(@$addresses[1]->state));
        $sheet->setCellValue('AI' . $rowCount, display_placeholder_text(@$addresses[1]->country));

        $sheet->setCellValue('AJ' . $rowCount, display_placeholder_text(@$addresses[1]->address));
        $sheet->setCellValue('AK' . $rowCount, display_placeholder_text(@$addresses[1]->locality));
        $sheet->setCellValue('AL' . $rowCount, display_placeholder_text(@$addresses[1]->postName));
        $sheet->setCellValue('AM' . $rowCount, display_placeholder_text(@$addresses[1]->city));
        $sheet->setCellValue('AN' . $rowCount, display_placeholder_text(@$addresses[1]->zip_code));
        $sheet->setCellValue('AO' . $rowCount, display_placeholder_text(@$addresses[1]->tehsil));
        $sheet->setCellValue('AP' . $rowCount, display_placeholder_text(@$addresses[1]->district));
        $sheet->setCellValue('AQ' . $rowCount, display_placeholder_text(@$addresses[1]->state));
        $sheet->setCellValue('AR' . $rowCount, display_placeholder_text(@$addresses[1]->country));
        

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