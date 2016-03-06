<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'logins/start';
$route['logins/display_signin'] = 'logins/display_signin';
$route['logins/display_registration'] = 'logins/display_registration';
$route['logins/register'] = 'logins/register';
$route['logins/signin'] = 'logins/signin';
$route['logins/display_dashboard'] = 'logins/display_dashboard';

$route['processes/display_add_user'] = 'processes/display_add_user';
$route['processes/create_user'] = 'processes/create_user';



$route['processes/display_edit/(:any)'] = 'processes/display_edit/$1';
$route['processes/update_password/(:any)'] = 'processes/update_password/$1';
$route['processes/update_profileinfo/(:any)'] = 'processes/update_profileinfo/$1'; 
$route['processes/update_description/(:any)'] = 'processes/update_description/$1';
$route['processes/display_wall/(:any)'] = 'processes/display_wall/$1';
$route['processes/add_message/(:any)/(:any)'] = 'processes/add_message/$1/$2';
$route['processes/add_comment/(:any)/(:any)'] = 'processes/add_comment/$1/$2';
$route['processes/remove_user/(:any)'] = 'processes/remove_user/$1';

$route['processes/edit_profileImg/(:any)'] = 'processes/edit_profileImg/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
