<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('SERVER_AP', '172.20.17.10');
define('SERVER_DB', '172.20.17.10');
define('PROJECT', 'mpn');
// define('USSER_DB', 'sa');
// define('PASS_DB', 'marvelvsc2');
define('URL_CSS', 'http://'.SERVER_AP.'/'.PROJECT.'/statics/css/');
define('URL_JS', 'http://'.SERVER_AP.'/'.PROJECT.'/statics/js/');
define('URL_IMG', 'http://'.SERVER_AP.'/'.PROJECT.'/statics/images/'); 
define('URL_FONTS', 'http://'.SERVER_AP.'/'.PROJECT.'/statics/fonts/'); 
define('URL_MAIN', 'http://'.SERVER_AP.'/'.PROJECT.'/'); 
define('KEY_ENCRIPT', 'sd$:%4sdfsd%:&$_/&(&/$&#[]??'); 
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */