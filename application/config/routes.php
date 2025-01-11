<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'RoutesController';

$route['login'] = 'RoutesController/login';
$route['register'] = 'RoutesController/register';
$route['home'] = 'RoutesController/home';
$route['page1'] = 'RoutesController/page1';
$route['page2'] = 'RoutesController/page2';
$route['redirectToPage1'] = 'RoutesController/redirectToPage1';

// $route['register'] = 'auth/register';
// $route['login'] = 'auth/login';
// $route['protected'] = 'auth/protectedRoute';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;