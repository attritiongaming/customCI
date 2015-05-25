<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** User routes **/

$route['login']  = "login_controller/login";
$route['logout']  = "login_controller/logout";
$route['register']  = "login_controller/register";
$route['activate']  = "login_controller/activate";
$route['forgot_password']  = "login_controller/forgot_password";
$route['accounts/activate/(:any)']  = "login_controller/account_activation/$1";

$route['migration/update'] = "Migrate/update";
$route['migration/check'] = "Migrate/check";
$route['migration/version'] = "Migrate/index";

/** END User routes **/


$route['default_controller'] = "install_controller/index";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */