
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
 
 function index()
 {
 error_reporting(E_ALL);
        ini_set('display_errors', 1);
  $this->load->model("excel_export_model");
  $data["employee_data"] = $this->excel_export_model->fetch_data();
  $this->load->view("excel_export_view", $data);
 }

 function action()
 {
  $this->load->model("excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("Name", "Email", "Gender", "Contact Number", "Marital Status");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $employee_data = $this->excel_export_model->fetch_data();

  $excel_row = 2;

  foreach($employee_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow('A', $excel_row, $row->name);
   $object->getActiveSheet()->setCellValueByColumnAndRow('B', $excel_row, $row->address);
   $object->getActiveSheet()->setCellValueByColumnAndRow('C', $excel_row, $row->gender);
   $object->getActiveSheet()->setCellValueByColumnAndRow('D', $excel_row, $row->designation);
   $object->getActiveSheet()->setCellValueByColumnAndRow('E', $excel_row, $row->age);
   $excel_row++;
  }
  $filename = time().'-list.xls';
  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header("Content-Type: application/force-download");
   header("Content-type: application/vnd.ms-excel");
   header("Content-type: text/xls");
   header("Content-type: 'text/xlsx'");
   header("Content-type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'");
   header("Content-Type: application/octet-stream");

   header("Content-Type: text/plain");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=testDemo.xlsx");
header("Content-Transfer-Encoding: binary");
header("Pragma: no-cache");
header("Expires: 0");
 /* header('Content-Description: File Transfer');
  header("Content-type: application/vnd.ms-excel");
  header('Content-Disposition: attachement; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');*/
/*  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename='.$filename);*/
  $object_writer->save('php://output');
 }

 
 
}
