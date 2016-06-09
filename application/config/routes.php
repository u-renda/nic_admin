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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// LOGIN
$route['index'] = 'login/index';
$route['logout'] = 'login/logout';

// HOME
$route['dashboard'] = 'home/dashboard';

// MEMBER
$route['member_create'] = 'member/member_create';
$route['member_delete'] = 'member/member_delete';
$route['member_edit'] = 'member/member_edit';
$route['member_get'] = 'member/member_get';
$route['member_invalid'] = 'member/member_invalid';
$route['member_lists'] = 'member/member_lists';
$route['member_request_transfer'] = 'member/member_request_transfer';
$route['member_view'] = 'member/member_view';

// EXTRA
$route['dropdown_kota_lists'] = 'extra/dropdown_kota_lists';

// POST
$route['post_create'] = 'post/post_create';
$route['post_delete'] = 'post/post_delete';
$route['post_edit'] = 'post/post_edit';
$route['post_get'] = 'post/post_get';
$route['post_lists'] = 'post/post_lists';

// ADMIN
$route['admin_create'] = 'admin/admin_create';
$route['admin_delete'] = 'admin/admin_delete';
$route['admin_edit'] = 'admin/admin_edit';
$route['admin_get'] = 'admin/admin_get';
$route['admin_lists'] = 'admin/admin_lists';

// OTHERS
$route['email_template_get'] = 'others/email_template_get';
$route['email_template_lists'] = 'others/email_template_lists';
$route['kota_get'] = 'others/kota_get';
$route['kota_lists'] = 'others/kota_lists';
$route['preferences_create'] = 'others/preferences_create';
$route['preferences_edit'] = 'others/preferences_edit';
$route['provinsi_create'] = 'others/provinsi_create';
$route['provinsi_delete'] = 'others/provinsi_delete';
$route['provinsi_edit'] = 'others/provinsi_edit';
$route['provinsi_get'] = 'others/provinsi_get';
$route['provinsi_lists'] = 'others/provinsi_lists';
$route['secret_santa_create'] = 'others/secret_santa_create';
$route['secret_santa_delete'] = 'others/secret_santa_delete';
$route['secret_santa_get'] = 'others/secret_santa_get';
$route['secret_santa_lists'] = 'others/secret_santa_lists';
$route['secret_santa_random'] = 'others/secret_santa_random';

// API DEBUG
$route['api_admin'] = 'api_debug/api_admin';
$route['api_member'] = 'api_debug/api_member';
$route['api_post'] = 'api_debug/api_post';
