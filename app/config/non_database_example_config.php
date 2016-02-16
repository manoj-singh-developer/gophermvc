<?php
	/**
	
	This is a non database installation config file. Where some items could be changed via the application a non-database install changes to site settings are made here
		
	**/
switch( $_SERVER['SERVER_NAME'] ){
	
	
	case 'location 1':
	break;
	
	case 'location 2 etc':
	break;
	
	default:
		
		$cfg['siteName'] = 'Gopher MVC';			
		$cfg['base_url'] = 'http://localhost/gophermvc';
		$cfg['debug'] = true;
		
		$cfg['server'] = 'localhost';
		
		$cfg['databaseName'] = 'gophermvc';
		$cfg['databaseUsername'] = 'root';
		$cfg['databasePassword'] = '';
		$cfg['databsePrefix'] = 'dac';
	
	break;
}
/***********************************************************/	
/***********************************************************/
/** These are by default saved in the database so hard coded here **/
define('TEMPLATE','default');
define('DATEFORMAT_FROM_MYSQL','%d/%m/%Y');
define('DATEFORMAT_PHP_UKDATE','Y-m-d');
define('TITLE_TAG',( !empty($cfg['siteName'])? $cfg['siteName'] : 'Site name') );
define('SITE_NAME',( !empty($cfg['siteName'])? $cfg['siteName'] : 'Site name') );
define('MAILCHIMP_APIKEY', 'a6db84dc204d4720c0c450a0bbac5b4f-us12');
/**/	
/***********************************************************/	
/**************** Nothing to change below ******************/

define('ROOT_NAMESPACE', 'SMVC');	
define('ROOT', $cfg['base_url'] );
define('DEBUG', $cfg['debug'] );
define('HASH_TYPE', 'sha512');
define('BASE_URL', $cfg['base_url'] );
define('INACTIVE_INTERVAL', 1);//Number of hours of inactivity before having to log in again

define('HOST', $cfg['server'] );
define('DB_NAME', $cfg['databaseName'] );
define('DB_USER', $cfg['databaseUsername'] );
define('DB_PREFIX', ( $cfg['databsePrefix'] ? $cfg['databsePrefix'].'_' : '') );
define('DB_PASSWORD', $cfg['databasePassword'] );

define('DATETIME_ZONE', 'Europe/London');