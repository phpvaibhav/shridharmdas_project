<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 		= 'home';
$route['404_override'] 				= 'my404';
$route['translate_uri_dashes'] 		= FALSE;
$route['hidesignup']				= 'admin/signup';
$route['dashboard']					= 'admin/dashboard';
$route['profile/(:any)'] 			= 'admin/profile/userDetail/$1';
$route['change_password/(:any)'] 	= 'admin/profile/changePassword/$1';
$route['users'] 					= 'admin/users';
$route['users-incomplete'] 			= 'admin/users/indexC';
$route['users-trash'] 			    = 'admin/users/trash';
$route['add-user'] 					= 'admin/users/add';
$route['user-excel'] 				= 'admin/users/userexcel';
$route['sub-admin'] 				= 'admin/adminrole/index';
$route['admin-permissions'] 		= 'admin/permissions/index';
$route['admin-permissions-set/(:any)'] = 'admin/permissions/detail/$1';
$route['activity-log'] 				= 'admin/activity/index';
$route['sub-admin-add'] 			= 'admin/adminrole/add';
$route['sub-admin-detail/(:any)'] 			= 'admin/adminrole/detail/$1';

$route['edit-user/(:any)'] 			= 'admin/users/edit';
$route['user-detail/(:any)'] 		= 'admin/users/detail/$1';
$route['preceptor'] 				= 'admin/preceptor';
$route['union'] 					= 'admin/union';
$route['office'] 					= 'admin/office';
$route['reports'] 					= 'admin/report';
$route['pachkan'] 					= 'admin/pachkan';
$route['sant-satee'] 					= 'admin/sant';


$route['sangh-users'] 					= 'admin/sanghusers';
$route['sangh-users-incomplete'] 			= 'admin/sanghusers/indexC';
$route['sangh-users-trash'] 			= 'admin/sanghusers/trash';
$route['sangh-add-user'] 					= 'admin/sanghusers/add';
$route['sangh-user-excel'] 				= 'admin/sanghusers/userexcel';
$route['sangh-edit-user/(:any)'] 			= 'admin/sanghusers/edit';
$route['sangh-user-detail/(:any)'] 		= 'admin/sanghusers/detail/$1';




$route['user-form'] 				= 'home/addUser';
$route['about-us'] 					= 'home/aboutus';
$route['jeevani'] 					= 'home/jeevani';
$route['jeevan-parichay'] 			= 'home/jeevani_parichay';
$route['vidhan'] 					= 'home/vidhan';
$route['pad-adhikari'] 				= 'home/pad_adhikari';
$route['shishy-vrksh'] 				= 'home/vrksh';


$route['contact-us'] 				= 'home/contact';
$route['moto'] 				= 'home/moto';
$route['gallery'] 					= 'home/gallery';
$route['motto-of-sdhp'] 			= 'home/motto_of_sdhp';
$route['user-step-1'] 				= 'home/user_step_1';
$route['user-form'] 				= 'home/user_from';
$route['user-form-2'] 				= 'home/user_from_2';
$route['user-step-2'] 				= 'home/user_step_2';
$route['user-step-3'] 				= 'home/user_step_3';
$route['user-preview'] 				= 'home/user_preview';

