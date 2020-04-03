
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/third_party/PHPExcel.php';  //load 
class Excel extends PHPExcel
{
 public function __construct()
 {
  parent::__construct();
 }
}

?>