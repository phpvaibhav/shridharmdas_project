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



 
 
}
