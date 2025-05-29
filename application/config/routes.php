<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

// Default Controller
$route['default_controller'] = 'auth';

// Authentication Routes
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['forgot-password'] = 'auth/forgot_password';
$route['logout'] = 'auth/logout';

// Admin Dashboard Routes
$route['admin'] = 'admin/index';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/users'] = 'admin/users';
$route['admin/users/create'] = 'admin/create_user';
$route['admin/users/edit/(:num)'] = 'admin/edit_user/$1';
$route['admin/users/delete/(:num)'] = 'admin/delete_user/$1';
$route['admin/courses'] = 'admin/courses';
$route['admin/assignments'] = 'admin/assignments';
$route['admin/reports'] = 'admin/reports';
$route['admin/settings'] = 'admin/settings';

// API Routes (if needed)
$route['api/users'] = 'api/users';
$route['api/users/(:num)'] = 'api/users/user/$1';

// Error Pages
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Custom Routes
$route['profile'] = 'user/profile';
$route['settings'] = 'user/settings';

/*
| -------------------------------------------------------------------------
| Additional Routing Rules
| -------------------------------------------------------------------------
|
| The $route array determines what URI patterns should be matched and
| what should be done when they are detected.
|
| Examples:
| $route['product/(:any)'] = 'catalog/product_lookup_by_name/$1';
| $route['category/(:num)'] = 'catalog/category_lookup_by_id/$1';
*/
