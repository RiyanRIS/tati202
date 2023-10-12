<?php
defined('BASEPATH') OR exit('No direct script access allowed');

global $SConfig;

$route['default_controller'] = 'auth/login';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

$route['admin'] = 'admin/dashboard';
	
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
