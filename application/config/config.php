<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
| If this is not set then CodeIgniter will try guess the protocol, domain
| and path to your installation. However, you should always configure this
| explicitly and never rely on auto-guessing, especially in production
| environments.
|
*/
$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$config['base_url'] = "$root";

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['index_page'] = '';

/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of 'REQUEST_URI' works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'REQUEST_URI'    Uses $_SERVER['REQUEST_URI']
| 'QUERY_STRING'   Uses $_SERVER['QUERY_STRING']
| 'PATH_INFO'      Uses $_SERVER['PATH_INFO']
|
| WARNING: If you set this to 'PATH_INFO', URIs will always be URL-decoded!
*/
$config['uri_protocol']	= 'REQUEST_URI';

/*
|--------------------------------------------------------------------------
| URL suffix
|--------------------------------------------------------------------------
|
| This option allows you to add a suffix to all URLs generated by CodeIgniter.
| For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/urls.html
*/

$config['url_suffix'] = '';

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/
$config['language']	= 'english';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
| See http://php.net/htmlspecialchars for a list of supported charsets.
|
*/
$config['charset'] = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
|
| If you would like to use the 'hooks' feature you must enable it by
| setting this variable to TRUE (boolean).  See the user guide for details.
|
*/
$config['enable_hooks'] = FALSE;

/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.  For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
$config['subclass_prefix'] = 'MY_';

/*
|--------------------------------------------------------------------------
| Composer auto-loading
|--------------------------------------------------------------------------
|
| Enabling this setting will tell CodeIgniter to look for a Composer
| package auto-loader script in application/vendor/autoload.php.
|
|	$config['composer_autoload'] = TRUE;
|
| Or if you have your vendor/ directory located somewhere else, you
| can opt to set a specific path as well:
|
|	$config['composer_autoload'] = '/path/to/vendor/autoload.php';
|
| For more information about Composer, please visit http://getcomposer.org/
|
| Note: This will NOT disable or override the CodeIgniter-specific
|	autoloading (application/config/autoload.php)
*/
$config['composer_autoload'] = FALSE;

/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify which characters are permitted within your URLs.
| When someone tries to submit a URL with disallowed characters they will
| get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| The configured value is actually a regular expression character group
| and it will be executed as: ! preg_match('/^[<permitted_uri_chars>]+$/i
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
|
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';


/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| By default CodeIgniter enables access to the $_GET array.  If for some
| reason you would like to disable it, set 'allow_get_array' to FALSE.
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The other items let you set the query string 'words' that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
|
*/
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| If you have enabled error logging, you can set an error threshold to
| determine what gets logged. Threshold options are:
| You can enable error logging by setting a threshold over zero. The
| threshold determines what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| You can also pass an array with threshold levels to show individual error types
|
| 	array(2) = Debug Messages, without Error Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log_threshold'] = 0;

/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/logs/ directory. Use a full server path with trailing slash.
|
*/
$config['log_path'] = '';

/*
|--------------------------------------------------------------------------
| Log File Extension
|--------------------------------------------------------------------------
|
| The default filename extension for log files. The default 'php' allows for
| protecting the log files via basic scripting, when they are to be stored
| under a publicly accessible directory.
|
| Note: Leaving it blank will default to 'php'.
|
*/
$config['log_file_extension'] = '';

/*
|--------------------------------------------------------------------------
| Log File Permissions
|--------------------------------------------------------------------------
|
| The file system permissions to be applied on newly created log files.
|
| IMPORTANT: This MUST be an integer (no quotes) and you MUST use octal
|            integer notation (i.e. 0700, 0644, etc.)
*/
$config['log_file_permissions'] = 0644;

/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
|
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
|--------------------------------------------------------------------------
| Error Views Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/views/errors/ directory.  Use a full server path with trailing slash.
|
*/
$config['error_views_path'] = '';

/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/cache/ directory.  Use a full server path with trailing slash.
|
*/
$config['cache_path'] = '';

/*
|--------------------------------------------------------------------------
| Cache Include Query String
|--------------------------------------------------------------------------
|
| Set this to TRUE if you want to use different cache files depending on the
| URL query string.  Please be aware this might result in numerous cache files.
|
*/
$config['cache_query_string'] = FALSE;

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class, you must set an encryption key.
| See the user guide for more info.
|
| http://codeigniter.com/user_guide/libraries/encryption.html
|
*/
$config['encryption_key'] = 'ke94G3o';

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'sess_driver'
|
|	The storage driver to use: files, database, redis, memcached
|
| 'sess_cookie_name'
|
|	The session cookie name, must contain only [0-9a-z_-] characters
|
| 'sess_expiration'
|
|	The number of SECONDS you want the session to last.
|	Setting to 0 (zero) means expire when the browser is closed.
|
| 'sess_save_path'
|
|	The location to save sessions to, driver dependant.
|
|	For the 'files' driver, it's a path to a writable directory.
|	WARNING: Only absolute paths are supported!
|
|	For the 'database' driver, it's a table name.
|	Please read up the manual for the format with other session drivers.
|
|	IMPORTANT: You are REQUIRED to set a valid save path!
|
| 'sess_match_ip'
|
|	Whether to match the user's IP address when reading the session data.
|
| 'sess_time_to_update'
|
|	How many seconds between CI regenerating the session ID.
|
| 'sess_regenerate_destroy'
|
|	Whether to destroy session data associated with the old session ID
|	when auto-regenerating the session ID. When set to FALSE, the data
|	will be later deleted by the garbage collector.
|
| Other session cookie settings are shared with the rest of the application,
| except for 'cookie_prefix' and 'cookie_httponly', which are ignored here.
|
*/
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'agnation_admin';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix'   = Set a cookie name prefix if you need to avoid collisions
| 'cookie_domain'   = Set to .your-domain.com for site-wide cookies
| 'cookie_path'     = Typically will be a forward slash
| 'cookie_secure'   = Cookie will only be set if a secure HTTPS connection exists.
| 'cookie_httponly' = Cookie will only be accessible via HTTP(S) (no javascript)
|
| Note: These settings (with the exception of 'cookie_prefix' and
|       'cookie_httponly') will also affect sessions.
|
*/
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

/*
|--------------------------------------------------------------------------
| Standardize newlines
|--------------------------------------------------------------------------
|
| Determines whether to standardize newline characters in input data,
| meaning to replace \r\n, \r, \n occurences with the PHP_EOL value.
|
| This is particularly useful for portability between UNIX-based OSes,
| (usually \n) and Windows (\r\n).
|
*/
$config['standardize_newlines'] = FALSE;

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
| WARNING: This feature is DEPRECATED and currently available only
|          for backwards compatibility purposes!
|
*/
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
| 'csrf_regenerate' = Regenerate token on every submission
| 'csrf_exclude_uris' = Array of URIs which ignore CSRF checks
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| Only used if zlib.output_compression is turned off in your php.ini.
| Please do not use it together with httpd-level output compression.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not 'echo' any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are 'local' or any PHP supported timezone. This preference tells
| the system whether to use your server's local time as the master 'now'
| reference, or convert it to the configured one timezone. See the 'date
| helper' page of the user guide for information regarding date handling.
|
*/
$config['time_reference'] = 'local';

/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
*/
$config['rewrite_short_tags'] = FALSE;


/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy
| IP addresses from which CodeIgniter should trust headers such as
| HTTP_X_FORWARDED_FOR and HTTP_CLIENT_IP in order to properly identify
| the visitor's IP address.
|
| You can use both an array or a comma-separated list of proxy addresses,
| as well as specifying whole subnets. Here are a few examples:
|
| Comma-separated:	'10.0.1.200,192.168.5.0/24'
| Array:		array('10.0.1.200', '192.168.5.0/24')
*/
$config['proxy_ips'] = '';

/*
|--------------------------------------------------------------------------
| Custom Config
|--------------------------------------------------------------------------
*/
/* Set Config API */
if(is_bool(LOCALHOST) || LOCALHOST == 'localhost')
{
    define('API_HOST', 'http://localhost/nic_api/');
    define('WEB_HOST', 'http://localhost/nic_web/');
    define('UPLOAD_HOST', 'http://localhost/nic_web/upload_nic/');
    define('UPLOAD_FOLDER', $_SERVER['DOCUMENT_ROOT'].'/nic_web/upload_nic/');
}
else
{
	define('API_HOST', 'http://api.theagnation.com/');
    define('WEB_HOST', 'http://theagnation.com/');
    define('UPLOAD_HOST', 'http://theagnation.com/upload_nic/'); // http://upload.theagnation.com/
    define('UPLOAD_FOLDER', '/home/nezind45/public_html/upload_nic/');
}

$config['development_mode'] = FALSE;
$config['title'] = 'AGnation';
$config['nic_api'] = API_HOST;
$config['nic_key'] = 'bd6fb882067e6896c1c193376cd411ee';
$config['email_admin'] = 'officialagnation@gmail.com';
$config['registration_fee'] = 150000;
$config['logo_nic'] = WEB_HOST.'assets/images/logo.png';

// Link
$config['link_admin_create'] = $config['base_url'].'admin_create';
$config['link_admin_delete'] = $config['base_url'].'admin_delete';
$config['link_admin_edit'] = $config['base_url'].'admin_edit';
$config['link_admin_lists'] = $config['base_url'].'admin_lists';
$config['link_admin_profile'] = $config['base_url'].'admin_profile';
$config['link_api_admin'] = $config['base_url'].'api_admin';
$config['link_api_member'] = $config['base_url'].'api_member';
$config['link_api_post'] = $config['base_url'].'api_post';
$config['link_dashboard'] = $config['base_url'].'dashboard';
$config['link_event_create'] = $config['base_url'].'event_create';
$config['link_event_lists'] = $config['base_url'].'event_lists';
$config['link_faq_create'] = $config['base_url'].'faq_create';
$config['link_faq_lists'] = $config['base_url'].'faq_lists';
$config['link_help_member_awaiting_review'] = $config['base_url'].'help_member_awaiting_review';
$config['link_image_album_create'] = $config['base_url'].'image_album_create';
$config['link_image_album_lists'] = $config['base_url'].'image_album_lists';
$config['link_kota_create'] = $config['base_url'].'kota_create';
$config['link_kota_lists'] = $config['base_url'].'kota_lists';
$config['link_login'] = $config['base_url'].'index';
$config['link_logout'] = $config['base_url'].'logout';
$config['link_member_approved'] = $config['base_url'].'member_approved';
$config['link_member_create'] = $config['base_url'].'member_create';
$config['link_member_delete'] = $config['base_url'].'member_delete';
$config['link_member_download'] = $config['base_url'].'member_download';
$config['link_member_edit'] = $config['base_url'].'member_edit';
$config['link_member_export'] = $config['base_url'].'member_export';
$config['link_member_invalid'] = $config['base_url'].'member_invalid';
$config['link_member_lists'] = $config['base_url'].'member_lists';
$config['link_member_request_transfer'] = $config['base_url'].'member_request_transfer';
$config['link_member_transfer_update'] = $config['base_url'].'member_transfer_edit';
$config['link_member_view'] = $config['base_url'].'member_view';
$config['link_order_create'] = $config['base_url'].'order_create';
$config['link_order_lists'] = $config['base_url'].'order_lists';
$config['link_post_create'] = $config['base_url'].'post_create';
$config['link_post_delete'] = $config['base_url'].'post_delete';
$config['link_post_edit'] = $config['base_url'].'post_edit';
$config['link_post_lists'] = $config['base_url'].'post_lists';
$config['link_preferences_create'] = $config['base_url'].'preferences_create';
$config['link_preferences_edit'] = $config['base_url'].'preferences_edit';
$config['link_preferences_lists'] = $config['base_url'].'preferences_lists';
$config['link_product_create'] = $config['base_url'].'product_create';
$config['link_product_lists'] = $config['base_url'].'product_lists';
$config['link_provinsi_create'] = $config['base_url'].'provinsi_create';
$config['link_provinsi_delete'] = $config['base_url'].'provinsi_delete';
$config['link_provinsi_edit'] = $config['base_url'].'provinsi_edit';
$config['link_provinsi_lists'] = $config['base_url'].'provinsi_lists';
$config['link_reg_invalid'] = WEB_HOST.'member_invalid';
$config['link_reset_password'] = WEB_HOST.'reset_password';
$config['link_secret_santa_create'] = $config['base_url'].'secret_santa_create';
$config['link_secret_santa_delete'] = $config['base_url'].'secret_santa_delete';
$config['link_secret_santa_lists'] = $config['base_url'].'secret_santa_lists';
$config['link_secret_santa_random'] = $config['base_url'].'secret_santa_random';
$config['link_web_transfer'] = WEB_HOST.'transfer_confirmation';

// Code
$config['code_member_idcard_type'] = array(
    1 => 'KTP',
    2 => 'SIM',
    3 => 'Passport',
    4 => 'Kartu Pelajar',
    5 => 'Lainnya'
);

$config['code_member_religion'] = array(
    1 => 'Islam',
    2 => 'Kristen',
    3 => 'Katolik',
    4 => 'Budha',
    5 => 'Hindu',
    6 => 'Kong Hu Chu',
    7 => 'Lainnya'
);

$config['code_product_sizable'] = array(
    0 => 'No',
    1 => 'Yes'
);

$config['code_product_status'] = array(
    0 => 'Normal',
    1 => 'Sale!',
    2 => 'Limited',
    3 => 'Pre Order',
    4 => 'Sold Out!',
    5 => 'Stock'
);

$config['code_product_type'] = array(
    0 => 'All',
    1 => 'Member Only'
);

$config['code_member_status'] = array(
    1 => 'Awaiting Review',
    2 => 'Awaiting Transfer',
    3 => 'Awaiting Approval',
    4 => 'Approved',
    5 => 'Invalid'
);

$config['code_member_gender'] = array(
    0 => 'Male',
    1 => 'Female'
);

$config['code_member_gender_initial'] = array(
    0 => 'M',
    1 => 'F'
);

$config['code_member_marital_status'] = array(
    0 => 'Single',
    1 => 'Married'
);

$config['code_member_shirt_size'] = array(
    0 => 'M',
    1 => 'XL'
);

$config['code_post_status'] = array(
    1 => 'Published',
    2 => 'Draft',
    3 => 'Deleted'
);

$config['code_post_type'] = array(
    1 => 'AGnation',
    2 => 'Agnez Mo'
);

$config['code_post_media_type'] = array(
    1 => 'Video',
    2 => 'Image',
    3 => 'No Media'
);

$config['code_yes_no'] = array(
    0 => 'No',
    1 => 'Yes'
);

$config['code_api_endpoint'] = array(
    'lists' => 'Lists',
    'info' => 'Info'
);

$config['code_api_sort'] = array(
    'asc' => 'Ascending',
    'desc' => 'Descending'
);

$config['code_api_admin_order'] = array(
    'username' => 'Username',
    'name' => 'Name',
    'email' => 'Email',
    'created_date' => 'Created Date'
);

$config['code_api_member_order'] = array(
    'username' => 'Username',
    'name' => 'Name',
    'email' => 'Email',
    'created_date' => 'Created Date',
    'approved_date' => 'Approved Date',
    'member_card' => 'Member Card',
    'member_number' => 'Member Number',
    'idcard_number' => 'ID Card Number',
    'birth_date' => 'Birth Date'
);

$config['code_api_post_order'] = array(
    'title' => 'Title',
    'created_date' => 'Created Date'
);

$config['code_secret_santa_status'] = array(
    0 => 'Not Chosen',
    1 => 'Already Choose'
);

$config['code_admin_role'] = array(
    1 => 'Administrator'
);

$config['code_admin_group'] = array(
    1 => 'Leadership',
    2 => 'Relation & Media',
    3 => 'Event'
);

$config['code_month'] = array(
    1 => 'Jan',
    2 => 'Feb',
    3 => 'Mar',
    4 => 'Apr',
    5 => 'Mei',
    6 => 'Jun',
    7 => 'Jul',
    8 => 'Agu',
    9 => 'Sep',
    10 => 'Okt',
    11 => 'Nov',
    12 => 'Des'
);

$config['code_cart_status'] = array(
    1 => 'Ordered',
    2 => 'Finished',
    3 => 'Canceled'
);

$config['code_event_status'] = array(
    0 => 'Hidden',
    1 => 'Show'
);

$config['code_faq_category'] = array(
    1 => 'Website',
    2 => 'AGnation'
);

$config['code_member_point_status'] = array(
    1 => 'Not Attended',
    2 => 'Attended',
    3 => 'Registered',
    4 => 'Canceled'
);

$config['code_member_transfer_type'] = array(
    1 => 'Membership',
    2 => 'Event',
    3 => 'Charity'
);

$config['code_member_transfer_status'] = array(
    1 => 'Waiting Transfer',
    2 => 'Paid',
    3 => 'Sent'
);

$config['code_product_image_status'] = array(
    0 => 'Not Available',
    1 => 'Available'
);

$config['code_order_status'] = array(
    1 => 'Ordered',
    2 => 'Paid',
    3 => 'Process by Admin',
    4 => 'Sent',
    5 => 'Received'
);

$config['code_order_transfer_status'] = array(
    1 => 'Waiting Transfer',
    2 => 'Paid',
    3 => 'Sent'
);

$config['code_1349x600'] = array(
    'width' => '1349',
    'height' => '600',
    'extra' => '_1349x600'
);

$config['code_640x640'] = array(
    'width' => '640',
    'height' => '640',
    'extra' => '_640x640'
);

$config['code_350x350'] = array(
    'width' => '350',
    'height' => '350',
    'extra' => '_350x350'
);
