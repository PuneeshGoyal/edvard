<?php
date_default_timezone_set("Asia/Kolkata");
/************ CMS v3.1 *************/
/*
-There are few changes in how sessions in admin panel work. Now you need to specify session name in init for admin panel.
-check_login file name changed
*/

session_start();

define('ROOT_DIR', dirname(__FILE__));
define('ADMIN_SESSION', 'admin_session');
//define('ROOT_URL', 'http://www.solitaireinfosys.com/demo/edvard');
//define('ROOT_URL', 'http://nobetes.com/');
define('ROOT_URL', 'http://192.168.1.226/solitaire/demo/edvard');

//$return_url = $ipn_page = "http://nobetes.com/"; // Change this acc. to site specs.
//$return_url = $ipn_page = "http://www.thetipdesk.com/demo/"; // Change this acc. to site specs.

$site_name = 'edvard';
$email_def = 'testing.slinfy@gmail.com';


//$email_merchant = 'paypal@thetipdesk.com';
$email_merchant = 'waliaw_1309867236_biz@gmail.com';

//$sandbox_env = '1'; // Sandbox environment

// Inventory settings
//$inventory = 0;

/*define('YOUR_APP_ID', '418106331553845');
define('YOUR_APP_SECRET', '97316b2ca8349dd8cefb6680eb83f491');
*/
?>