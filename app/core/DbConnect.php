<?php
namespace SMVC\Core;
use \PDO;

	class DbConnect {

/***************************************************************************/		
		
	public function __construct()
	{ }
/***************************************************************************/		
		
	public function db_conection($method = 'PDO')
	{
	
		$conn = '';
		
		switch ($method){
			
			case 'mysqli':
				if( !isset($link) )
				{
					$link = mysqli_connect(HOST, DB_USER, DB_PASSWORD, DB_NAME);
					//$link->query("SET SQL_BIG_SELECTS=1"); 
				}
				
				echo $link->connect_error;
				
				//If connection was not successful
				if( $link->connect_error )
				{
					if( DEBUG === true )
					{
						debug_onscreen($link->connect_error);
					}
					return;	
				}
				
				return $link;
			break;
			
			default://PDO
				try{
					$conn = new PDO("mysql:host=". HOST .";dbname=". DB_NAME, DB_USER, DB_PASSWORD);
				// set the PDO error mode to exception
					$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
				}
				catch(PDOException $exception){
				    $_SESSION['MSG'] = "Connection error: " . $exception->getMessage();
				}
				
				return $conn;
			break;
	
		}//End SWITCH
}
/***************************************************************************/		
}