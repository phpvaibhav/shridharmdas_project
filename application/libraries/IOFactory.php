
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/third_party/PHPExcel/IOFactory.php';  //load 
class IOFactory extends PHPExcel_IOFactory
{
 public function __construct()
 {
  parent::__construct();
 }
}

?>
