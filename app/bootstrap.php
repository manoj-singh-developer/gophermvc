<?php
	/**
		Bootstrap common requirments	
	**/

session_start();
use SMVC\Core\Security;
use SMVC\Core\DbConnect;

//Composer autoloader	
	require '../vendor/autoload.php';
//Config files
	require 'config/config.php';
	
/**
	Main MVC core is based on classes
	core/App.php
	core/SiteSettings.php
	core/Controller.php
	
	Called via Composer autoload.php
**/
	
