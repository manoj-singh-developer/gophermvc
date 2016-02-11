<?php
use SMVC\Core\DbConnect;
class BaseController{

/***************************************************************************/
	function __construct( $returnArray = false )
	{
		if($returnArray === false)//Default set site defined values
		{
			//$this->setSiteSettings();
			return;
		}
		
		return;

	}	
/***************************************************************************/
	protected function getEnvironmentValues( $includeAllValues = false )
	{
		$data = array();
		
		$params = array();
	
		$sql = " SELECT *, environment_id as id FROM ".DB_PREFIX."environment;";
			
		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			if( $pdo->execute($params) ){
				while( $row = $pdo->fetch() ){
					
					if($includeAllValues == false)
					{
						$data[$row['environment_variable_name']] = $row['environment_value'];
					}else{
						$data[ $row['id'] ] = $row;
					}
					
				}
			}
		
		}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
		
		return $data;
	}	
/***************************************************************************/
	protected function setSiteSettings()
	{
		$environment = $this->getEnvironmentValues();
		
		array_walk($environment, function($value, $key){
			define($this->formatConstantKey($key), $value);
		});
		
		return;
	}
/***************************************************************************/
	public function returnSiteSettingsArray()
	{
		$environment = $this->getEnvironmentValues( true );
		$formattedEnvironmentValues = array();
		
		foreach( $environment as $key => $value ){
			$value['environment_variable_name'] = $this->formatConstantKey( $value['environment_variable_name']);
			$formattedEnvironmentValues[ $key ] = $value;
		};

		return $formattedEnvironmentValues;
	}
/***************************************************************************/
	protected function formatConstantKey( $key = null )
	{
		$key = strtoupper( str_replace(' ', '_', $key) );
		return $key;
	}
/***************************************************************************/

}	