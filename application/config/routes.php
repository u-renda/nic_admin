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
$route['member_approved'] = 'member/member_approved';
$route['member_create'] = 'member/member_create';
$route['member_delete'] = 'member/member_delete';
$route['member_download'] = 'member/member_download';
$route['member_edit'] = 'member/member_edit';
$route['member_export'] = 'member/member_export';
$route['member_get'] = 'member/member_get';
$route['member_invalid'] = 'member/member_invalid';
$route['member_lists'] = 'member/member_lists';
$route['member_request_transfer'] = 'member/member_request_transfer';
$route['member_transfer_edit'] = 'member/member_transfer_edit';
$route['member_view'] = 'member/member_view';

// EXTRA
$route['check_admin_email'] = 'extra/check_admin_email';
$route['check_admin_initial'] = 'extra/check_admin_initial';
$route['check_admin_name'] = 'extra/check_admin_name';
$route['check_kota'] = 'extra/check_kota';
$route['check_kota_lists'] = 'extra/check_kota_lists';
$route['check_member_email'] = 'extra/check_member_email';
$route['check_member_idcard_number'] = 'extra/check_member_idcard_number';
$route['check_member_name'] = 'extra/check_member_name';
$route['check_member_phone_number'] = 'extra/check_member_phone_number';
$route['check_product_name'] = 'extra/check_product_name';
$route['check_provinsi'] = 'extra/check_provinsi';
$route['upload_image'] = 'extra/upload_image';

// POST
$route['post_create'] = 'post/post_create';
$route['post_delete'] = 'post/post_delete';
$route['post_edit'] = 'post/post_edit';
$route['post_get'] = 'post/post_get';
$route['post_lists'] = 'post/post_lists';
$route['post_view'] = 'post/post_view';

// ADMIN
$route['admin_create'] = 'admin/admin_create';
$route['admin_delete'] = 'admin/admin_delete';
$route['admin_edit'] = 'admin/admin_edit';
$route['admin_get'] = 'admin/admin_get';
$route['admin_lists'] = 'admin/admin_lists';
$route['admin_view'] = 'admin/admin_view';

// OTHERS
$route['faq_create'] = 'others/faq_create';
$route['faq_delete'] = 'others/faq_delete';
$route['faq_get'] = 'others/faq_get';
$route['faq_lists'] = 'others/faq_lists';
$route['kota_create'] = 'others/kota_create';
$route['kota_delete'] = 'others/kota_delete';
$route['kota_get'] = 'others/kota_get';
$route['kota_lists'] = 'others/kota_lists';
$route['preferences_create'] = 'others/preferences_create';
$route['preferences_delete'] = 'others/preferences_delete';
$route['preferences_edit'] = 'others/preferences_edit';
$route['preferences_get'] = 'others/preferences_get';
$route['preferences_lists'] = 'others/preferences_lists';
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

// IMAGE GALLERY
$route['image_album_create'] = 'image/image_album_create';
$route['image_album_delete'] = 'image/image_album_delete';
$route['image_album_get'] = 'image/image_album_get';
$route['image_album_lists'] = 'image/image_album_lists';
$route['image_delete'] = 'image/image_delete';
$route['image_lists'] = 'image/image_lists';

// ORDER
$route['order_create'] = 'order/order_create';
$route['order_delete'] = 'order/order_delete';
$route['order_get'] = 'order/order_get';
$route['order_lists'] = 'order/order_lists';

// PRODUCT
$route['product_create'] = 'product/product_create';
$route['product_delete'] = 'product/product_delete';
$route['product_get'] = 'product/product_get';
$route['product_lists'] = 'product/product_lists';
$route['product_view'] = 'product/product_view';

// EVENT
$route['event_create'] = 'event/event_create';
$route['event_delete'] = 'event/event_delete';
$route['event_get'] = 'event/event_get';
$route['event_lists'] = 'event/event_lists';

// HELP
$route['help_member_awaiting_review'] = 'help/help_member_awaiting_review';
