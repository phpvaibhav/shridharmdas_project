<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Stichoza\GoogleTranslate\GoogleTranslate;
class Lantest extends CI_Controller {
 
 function index()
 {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
 	$tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
 	$text = $tr->translate('वैभव शर्मा');

	echo $tr->getLastDetectedSource(); // Output: en
	echo "<br><br>";
 	echo $tr->setSource('en')->setTarget('hi')->translate("Vaibhav sharma");
 	echo "<br><br>";
 	echo $tr->setSource('hi')->setTarget('en')->translate("NO . 1234567889");
 }

function test()
 {
	
                 
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
                    $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader      = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel    = $objReader->load($inputFileName);
                    $worksheetData  = $objReader->listWorksheetInfo($inputFileName);
                    $totalRows      = $worksheetData[0]['totalRows'];
                    $totalColumns   = $worksheetData[0]['totalColumns'];
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
               // $result = $this->common_model->insertData('users',$data_val);
               
                //if($result){
                  /*  $userId = $result;
                    $add_meta['userId']         = $userId;
                    $add_meta1['userId']        = $userId;
                    $meta_val['userId']             = $result;
                    $this->common_model->insertData('user_meta',$meta_val);
                    $this->common_model->insertData('addresses',$add_meta);
                    $this->common_model->insertData('addresses',$add_meta1);*/
               // }
                    /*************Address*******************/
               //$data[$i]= array('user'=> $data_val,'user_meta'=>$meta_val);
                   /*   $inserdata[$i]['firstName'] = $value['A'];
                      $inserdata[$i]['lastName'] = $value['B'];
                      $inserdata[$i]['parentName'] = $value['C'];
                      $inserdata[$i]['familyHeadName'] = $value['D'];*/
                      $data[$i] = array('user'=>$data_val,'user_meta'=>$meta_val);
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



 
 
}
