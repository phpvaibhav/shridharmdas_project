<?php
/**
 * @package Phpspreadsheet :  Phpspreadsheet
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Phpspreadsheet Controller
 */

defined('BASEPATH') OR exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Phpspreadsheet extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
     error_reporting(E_ALL);
        ini_set('display_errors', 1);
    // load model
        $this->load->model('Site', 'site');
  }
  // index
  public function index()
  {
    $data = array();
    $data['title'] = 'Import Excel Sheet | Coders Mag';
    $data['breadcrumbs'] = array('Home' => '#');
    $data['empInfo'] = $this->site->employeeList();
    $this->load->view('spreadsheet/export', $data);
  }

  // export file Xlsx, Xls and Csv
  public function export()
  {
    
    $extension = $this->input->post('export_type');
    if(!empty($extension)){
      $extension = $extension;
    } else {
      $extension = 'xlsx';
    }
    $this->load->helper('download');  
    $data = array();
    $data['title'] = 'Export Excel Sheet | Coders Mag';
    // get employee list
    $empInfo = $this->site->employeeList();
    $fileName = 'employee-'.time(); 
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'First_Name');
        $sheet->setCellValue('B1', 'Last_Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'DOB');
        $sheet->setCellValue('E1', 'Contact_No');

        $rowCount = 2;
        foreach ($empInfo as $element) {
            $sheet->setCellValue('A' . $rowCount, $element['firstName']);
            $sheet->setCellValue('B' . $rowCount, $element['lastName']);
            $sheet->setCellValue('C' . $rowCount, $element['email']);
            $sheet->setCellValue('D' . $rowCount, $element['dob']);
            $sheet->setCellValue('E' . $rowCount, $element['contactNumber']);
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
  }
}
?>