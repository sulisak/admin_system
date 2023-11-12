<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */

 error_reporting(0);
ini_set('display_errors', 0);


//error_reporting(E_ALL);
//ini_set("display_errors", 1);

ini_set('session.gc_maxlifetime', 36000);




//error_reporting(0);
//ini_set('display_errors', 0);
/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */
define('URL', $_ENV["URL"]);
define('URL_REQUESTER', $_ENV["URL_REQUESTER"]);



/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', $_ENV["DB_HOST"]);
define('DB_NAME', $_ENV["DB_NAME"]);
define('DB_USER', $_ENV["DB_USER"]);
define('DB_PASS', $_ENV["DB_PASS"]);
define('set_charset', 'UTF-8');
define('DB_SCHEMA', 'public');

define('SMTP_HOST','gator3043.hostgator.com');
define('SMTP_PORT','465');
define('SMTP_USERNAME','info-software@aifgrouplaos.com');
define('SMTP_PASS','SaveMe##2022');
define('SMTP_ENCRYPTION','ssl');

?>
