<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel_import extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->check_admin_user_session();
    }
    public function index(){
     
        $data['title']      = 'Import';
		
          $data['front_scripts'] = array('backend_assets/custom/js/excel_import.js');
        $this->load->admin_render('excel/index', $data, '');
    } //End function
    //import

    public function importFile(){
  
                 
                $path = 'uploads/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('excelFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data_U = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data_U['upload_data']['file_name'])) {
                    $import_xls_file = $data_U['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;
                 
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $worksheetData = $objReader->listWorksheetInfo($inputFileName);
                    $totalRows     = $worksheetData[0]['totalRows'];
                    $totalColumns  = $worksheetData[0]['totalColumns'];
                   // pr($totalColumns);
                    if($totalColumns==35){
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }
                        /*   $inserdata[$i]['firstName'] = $value['A'];
                      $inserdata[$i]['lastName'] = $value['B'];
                      $inserdata[$i]['parentName'] = $value['C'];
                      $inserdata[$i]['familyHeadName'] = $value['D'];*/
                       $firstName              = $value['A'];
                    $lastName               = $value['B'];
                    $parentName             = $value['C'];
                    $familyHeadName         = $value['D'];
                    $email                  = $value['E'];
                    $contactNumber          = $value['F'];
                    $aadharNumber           = $value['G'];
                    $dob                    = $value['H'];
                    $gender                 = $value['I'];
                    $maritalStatus          = $value['J'];
                    $education              = $value['K'];
                    $profession             = $value['L'];
                    $bloodGroup             = $value['M'];
                    $preceptorName          = $value['N'];
                    $unionName              = $value['O'];
                    $religiousKnowledge     = $value['P'];
                    $unionResponsibility    = $value['Q'];
                    //Address
                     $address               = $value['R'];
                     $locality              = $value['S'];
                     $postName              =$value['T'];
                     $city                  =$value['U'];
                     $zip_code              = $value['V'];
                     $tehsil                =$value['W'];
                     $district              = $value['X'];
                     $state                 =$value['Y'];
                     $country               =$value['Z'];
                     //p Address
                     $paddress              =$value['AA'];
                     $plocality             = $value['AB'];
                     $ppostName             = $value['AC'];
                     $pcity                 = $value['AD'];
                     $pzip_code             = $value['AE'];
                     $ptehsil               = $value['AF'];
                     $pdistrict             = $value['AG'];
                     $pstate                = $value['AH'];
                     $pcountry              = $value['AI'];
                     $firstName             =   trim(($firstName=='NA') ? "":$firstName);
                     $lastName              =   trim(($lastName=='NA') ? "":$lastName);
                     $fullName              =   trim($firstName." ".$lastName);

                $contactNumber              = trim(str_replace(array('(',')','-','Self','Husband','Wife','Father','Mother','Brother','Sister','Son','Daughter',' '),array('','','','','','','','','','','','',''),$contactNumber));
                $data_val['dob']                    = date('Y-m-d',strtotime($dob)); 

                $data_val['firstName']              =  trim(($firstName=='NA') ? "":$firstName);//$firstName;
                $data_val['lastName']               = trim(($lastName=='NA') ? "":$lastName);//$lastName; 
                $data_val['fullName']               = trim(($fullName=='NA') ? "":$fullName);//$fullName; 
                $data_val['parentName']             = trim(($parentName=='NA') ? "":$parentName);//$parentName; 
                $data_val['familyHeadName']         = trim(($familyHeadName=='NA') ? "":$familyHeadName);//$familyHeadName; 
                $data_val['countrycode']            = '+91'; 
                $data_val['whose_contact_number']   = 'Self'; 
                $data_val['mobileVerify']           = 0; 
                 $data_val['gender']                = trim(($gender=='NA') ? "":$gender);//$gender;
                $data_val['maritalStatus']          = trim(($maritalStatus=='NA') ? "":$maritalStatus);//$maritalStatus;
                $data_val['communicationCode']      = trim(($zip_code=='NA') ? "":$zip_code);//$zip_code;

                $data_val['contactNumber']          = $contactNumber;
               // $data_val['aadharNumber']           = $aadharNumber; 
                $data_val['userName']               = rand('111111','999999'); 
                $data_val['password']               = password_hash('123!@#', PASSWORD_DEFAULT);

                //meta

                $meta_val['hindiFirstName']         = trim(($firstName=='NA') ? "":$firstName);
                $meta_val['hindiLastName']          = trim(($lastName=='NA') ? "":$lastName);
                $meta_val['hindiFullName']          = trim(($fullName=='NA') ? "":$fullName);
                $meta_val['hindiParentName']        = trim(($parentName=='NA') ? "":$parentName);
                $meta_val['hindiFamilyHeadName']    = trim(($familyHeadName=='NA') ? "":$familyHeadName);
                $meta_val['actualFirstName']        =   trim(($firstName=='NA') ? "":$firstName);
                $meta_val['actualLastName']         =   trim(($lastName=='NA') ? "":$lastName);
                $meta_val['actualFullName']         = trim(($fullName=='NA') ? "":$fullName);
                $meta_val['actualParentName']       = trim(($parentName=='NA') ? "":$parentName);
                $meta_val['actualFamilyHeadName']   = trim(($familyHeadName=='NA') ? "":$familyHeadName); 
               
                $meta_val['profession']        = trim(($profession=='NA') ? "":$profession); //$profession;
                $meta_val['subProfession']     = @$subProfession;
                $meta_val['otherProfession']   = @$otherProfession;
                $meta_val['bloodGroup']        = @$bloodGroup;
                $meta_val['education']         = @$education;
                $meta_val['religiousKnowledge']  = @$religiousKnowledge;

                $sangh                              = $this->common_model->is_data_exists('shree_sangh',array('name'=>$unionName));
                if($sangh){
                    $data_val['sanghId']         = $sangh->sanghId;
                    $meta_val['unionName']       = $sangh->name;
                }else{
                    $data_val['sanghId']         = 128;
                    $meta_val['unionName']       = 'OTHER';
                    $meta_val['otherUnionName']    =  trim(($unionName=='NA') ? "":$unionName); //$unionName;
                }
                  /*************Address*******************/
               
                $add_meta['zip_code']       = $zip_code;
                $add_meta['address']        = $address;
                $add_meta['locality']           = $locality;
                $add_meta['city']           = $city;
                $add_meta['tehsil']         = $tehsil;
                $add_meta['district']       = $district;
                $add_meta['country']        = $country;
                $add_meta['state']          = $state;
                $add_meta['postName']       = $postName;
                $add_meta['addressType']    = 'Current';

              
                $add_meta1['zip_code']      = $pzip_code;
                $add_meta1['address']       = $paddress;
                 $add_meta1['locality']           = $plocality;
                $add_meta1['city']          = $pcity;
                $add_meta1['tehsil']        = $ptehsil;
                $add_meta1['district']      = $pdistrict;
                $add_meta1['country']       = $pcountry;
                $add_meta1['state']         = $pstate;
                $add_meta1['postName']      =$ppostName;
                $add_meta1['addressType']   = 'Permanent';
                $result = $this->common_model->insertData('users',$data_val);
               
                if($result){
                    $userId = $result;
                    $add_meta['userId']         = $userId;
                    $add_meta1['userId']        = $userId;
                    $meta_val['userId']             = $result;
                    $this->common_model->insertData('user_meta',$meta_val);
                    $this->common_model->insertData('addresses',$add_meta);
                    $this->common_model->insertData('addresses',$add_meta1);
                }
                    /*************Address*******************/
               //$data[$i]= array('user'=> $data_val,'user_meta'=>$meta_val);
                   /*   $inserdata[$i]['firstName'] = $value['A'];
                      $inserdata[$i]['lastName'] = $value['B'];
                      $inserdata[$i]['parentName'] = $value['C'];
                      $inserdata[$i]['familyHeadName'] = $value['D'];*/
                      $data[$i] =$result;
                      $i++;
                    }      
                   $res = array('status'=>1,'message'=>'Record import successfully.','data'=>$data);        
                }else{
                  $res = array('status'=>0,'message'=>'Excel file not support.');   
                }
              } catch (Exception $e) {
                $res = array('status'=>0,'message'=>'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME). '": ' .$e->getMessage());  
                   //die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            //. '": ' .$e->getMessage());
                }
              }else{
                $res = array('status'=>0,'message'=>$error['error']); 
               
             }
       $this->output->set_content_type('application/json')
            ->set_output(json_encode($res));
        
    }
    //import
   function import()
    {
       
        if(isset($_FILES["excelFile"]["name"]))
        {
            $path = $_FILES["excelFile"]["tmp_name"];
            $file = $_FILES['excelFile']['tmp_name'];
            $handle = fopen($file, "r");
            $c = 0;//
            while(($filesop = fgetcsv($handle, 10000, ",")) !== false)
            {
                //$fname = $filesop[0];
                //$lname = $filesop[1];
                if($c<>0){                  //SKIP THE FIRST ROW
                   $firstName              = $filesop[0];//$worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lastName               = $filesop[0];//$worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $parentName             = $filesop[0];//$worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $familyHeadName         = $filesop[0];//$worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $email                  = $filesop[0];//$worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $contactNumber          = $filesop[0];//$worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $aadharNumber           = $filesop[0];//$worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $dob                    = $filesop[0];//$worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $gender                 = $filesop[0];//$worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $maritalStatus          = $filesop[0];//$worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $education              = $filesop[0];//$worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $profession             = $filesop[0];//$worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $bloodGroup             = $filesop[0];//$worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $preceptorName          = $filesop[0];//$worksheet->getCellByColumnAndRow(13, $row)->getValue();
                   // 
                    $unionName              = $filesop[0];//$worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $religiousKnowledge     = $filesop[0];//$worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $unionResponsibility    = $filesop[0];//$worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    //Address
                     $address               = $filesop[0];//$worksheet->getCellByColumnAndRow(17, $row)->getValue();
                     $locality              = $filesop[0];//$worksheet->getCellByColumnAndRow(18, $row)->getValue();
                     $postName              = $filesop[0];//$worksheet->getCellByColumnAndRow(19, $row)->getValue();
                     $city                  = $filesop[0];//$worksheet->getCellByColumnAndRow(20, $row)->getValue();
                     $zip_code              = $filesop[0];//$worksheet->getCellByColumnAndRow(21, $row)->getValue();
                     $tehsil                = $filesop[0];//$worksheet->getCellByColumnAndRow(22, $row)->getValue();
                     $district              = $filesop[0];//$worksheet->getCellByColumnAndRow(23, $row)->getValue();
                     $state                 = $filesop[0];//$worksheet->getCellByColumnAndRow(24, $row)->getValue();
                     $country               = $filesop[0];//$worksheet->getCellByColumnAndRow(25, $row)->getValue();
                     //p Address
                     $paddress              = $filesop[0];//$worksheet->getCellByColumnAndRow(26, $row)->getValue();
                     $plocality             = $filesop[0];//$worksheet->getCellByColumnAndRow(27, $row)->getValue();
                     $ppostName             = $filesop[0];//$worksheet->getCellByColumnAndRow(28, $row)->getValue();
                     $pcity                 = $filesop[0];//$worksheet->getCellByColumnAndRow(29, $row)->getValue();
                     $pzip_code             = $filesop[0];//$worksheet->getCellByColumnAndRow(30, $row)->getValue();
                     $ptehsil               = $filesop[0];//$worksheet->getCellByColumnAndRow(31, $row)->getValue();
                     $pdistrict             = $filesop[0];//$worksheet->getCellByColumnAndRow(32, $row)->getValue();
                     $pstate                = $filesop[0];//$worksheet->getCellByColumnAndRow(33, $row)->getValue();
                     $pcountry              = $filesop[0];//$worksheet->getCellByColumnAndRow(34, $row)->getValue();
                     $firstName             =   trim(($firstName=='NA') ? "":$firstName);
                     $lastName              =   trim(($lastName=='NA') ? "":$lastName);
                     $fullName              =   trim($firstName." ".$lastName);

                $contactNumber              = trim(str_replace(array('(',')','-','Self','Husband','Wife','Father','Mother','Brother','Sister','Son','Daughter',' '),array('','','','','','','','','','','','',''),$contactNumber));
                $data_val['dob']                    = date('Y-m-d',strtotime($dob)); 

                $data_val['firstName']              = $firstName;
                $data_val['lastName']               = $lastName; 
                $data_val['fullName']               = $fullName; 
                $data_val['parentName']             = $parentName; 
                $data_val['familyHeadName']         = $familyHeadName; 
                $data_val['countrycode']            = '+91'; 
                $data_val['whose_contact_number']   = 'Self'; 
                $data_val['mobileVerify']           = 0; 
                 $data_val['gender']                = $gender;
                $data_val['maritalStatus']          = $maritalStatus;
                $data_val['communicationCode']      = $zip_code;

                $data_val['contactNumber']          = $contactNumber;
               // $data_val['aadharNumber']           = $aadharNumber; 
                $data_val['userName']               = rand('111111','999999'); 
                $data_val['password']               = password_hash('123!@#', PASSWORD_DEFAULT);

                //meta

                $meta_val['hindiFirstName']         = trim($firstName);
                $meta_val['hindiLastName']          = trim($lastName);//$hindiLastName;
                $meta_val['hindiFullName']          = trim($fullName);//$hindiFullName;
                $meta_val['hindiParentName']        =  trim($parentName);//$hindiParentName;
                $meta_val['hindiFamilyHeadName']    = trim($familyHeadName);//$hindiFamilyHeadName;
                $meta_val['actualFirstName']        =  trim($firstName);
                $meta_val['actualLastName']         =  trim($lastName);
                $meta_val['actualFullName']         = trim($fullName);
                $meta_val['actualParentName']       = trim($parentName);
                $meta_val['actualFamilyHeadName']   = trim($familyHeadName); 
               
                $meta_val['profession']        = $profession;
                $meta_val['subProfession']     = @$subProfession;
                $meta_val['otherProfession']   = @$otherProfession;
                $meta_val['bloodGroup']        = @$bloodGroup;
                $meta_val['education']         = @$education;
                $meta_val['religiousKnowledge']  = @$religiousKnowledge;

                $sangh                              = $this->common_model->is_data_exists('shree_sangh',array('name'=>$unionName));
                if($sangh){
                    $data_val['sanghId']         = $sangh->sanghId;
                    $meta_val['unionName']       = $sangh->name;
                }else{
                    $data_val['sanghId']         = 128;
                    $meta_val['unionName']       = 'OTHER';
                    $meta_val['otherUnionName']    = $unionName;
                }
               $data[]= array('user'=> $data_val,'user_meta'=>$meta_val);
                }
                $c = $c + 1;
            }
           /* $this->load->library('excel');
            $object = PHPExcel_IOFactory::load($path);*/

           /* foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $firstName              = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lastName               = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $parentName             = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $familyHeadName         = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $email                  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $contactNumber          = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $aadharNumber           = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $dob                    = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $gender                 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $maritalStatus          = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $education              = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $profession             = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $bloodGroup             = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $preceptorName          = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                   // 
                    $unionName              = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $religiousKnowledge     = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $unionResponsibility    = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    //Address
                     $address               = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                     $locality              = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                     $postName              = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                     $city                  = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                     $zip_code              = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                     $tehsil                = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                     $district              = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                     $state                 = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                     $country               = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                     //p Address
                     $paddress              = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                     $plocality             = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                     $ppostName             = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                     $pcity                 = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                     $pzip_code             = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                     $ptehsil               = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                     $pdistrict             = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                     $pstate                = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
                     $pcountry              = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
                     $firstName     =  trim(($firstName=='NA') ? "":$firstName);
                     $lastName      = trim(($lastName=='NA') ? "":$lastName);
                     $fullName      = trim($firstName." ".$lastName);

                $contactNumber                      = trim(str_replace(array('(',')','-','Self','Husband','Wife','Father','Mother','Brother','Sister','Son','Daughter',' '),array('','','','','','','','','','','','',''),$contactNumber));
                $data_val['dob']                    = date('Y-m-d',strtotime($dob)); 

                $data_val['firstName']              = $firstName;
                $data_val['lastName']               = $lastName; 
                $data_val['fullName']               = $fullName; 
                $data_val['parentName']             = $parentName; 
                $data_val['familyHeadName']         = $familyHeadName; 
                $data_val['countrycode']            = '+91'; 
                $data_val['whose_contact_number']   = 'Self'; 
                $data_val['mobileVerify']           = 0; 
                 $data_val['gender']                = $gender;
                $data_val['maritalStatus']          = $maritalStatus;
                $data_val['communicationCode']      = $zip_code;

                $data_val['contactNumber']          = $contactNumber;
               // $data_val['aadharNumber']           = $aadharNumber; 
                $data_val['userName']               = rand('111111','999999'); 
                $data_val['password']               = password_hash('123!@#', PASSWORD_DEFAULT);

                //meta

                $meta_val['hindiFirstName']         = trim($firstName);
                $meta_val['hindiLastName']          = trim($lastName);//$hindiLastName;
                $meta_val['hindiFullName']          = trim($fullName);//$hindiFullName;
                $meta_val['hindiParentName']        =  trim($parentName);//$hindiParentName;
                $meta_val['hindiFamilyHeadName']    = trim($familyHeadName);//$hindiFamilyHeadName;
                $meta_val['actualFirstName']        =  trim($firstName);
                $meta_val['actualLastName']         =  trim($lastName);
                $meta_val['actualFullName']         = trim($fullName);
                $meta_val['actualParentName']       = trim($parentName);
                $meta_val['actualFamilyHeadName']   = trim($familyHeadName); 
               
                $meta_val['profession']        = $profession;
                $meta_val['subProfession']     = @$subProfession;
                $meta_val['otherProfession']   = @$otherProfession;
                $meta_val['bloodGroup']        = @$bloodGroup;
                $meta_val['education']         = @$education;
                $meta_val['religiousKnowledge']  = @$religiousKnowledge;

                $sangh                              = $this->common_model->is_data_exists('shree_sangh',array('name'=>$unionName));
                if($sangh){
                    $data_val['sanghId']         = $sangh->sanghId;
                    $meta_val['unionName']       = $sangh->name;
                }else{
                    $data_val['sanghId']         = 128;
                    $meta_val['unionName']       = 'OTHER';
                    $meta_val['otherUnionName']    = $unionName;
                }
               $data[]= array('user'=> $data_val,'user_meta'=>$meta_val);
               
                //meta
               
                }
            }*/
           pr($data);
        }   
    }
}//End Class