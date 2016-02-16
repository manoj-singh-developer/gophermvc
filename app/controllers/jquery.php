<?php
	
use SMVC\Core\DbConnect;
use SMVC\Biometrics\BioController;

/**
	
	Example of using the MVC method for returning different types of data. Notice the only difference from returning HTML is that View called processes the $data array and echoes out json,xml, etc 
	
**/	
	
class Jquery extends Controller
{
/********************************************************************************************************************/		
	public function index()
	{

	}
/********************************************************************************************************************/		
	public function getbiometric( $id )
	{
		/** Call View and pass values **/
		$this->view('rtnData/json', 
					array(
						'json' => (new BioController)->getBiometricMasterData( $id ),
					)
				);
	}		
/********************************************************************************************************************/		
	public function updateEnviromentSettings( $id = null )
	{
		extract($_POST);
		( new AppSettings )->updateSettings( $id, $value );
		
		$this->view('rtnData/json', 
					array(
						'json' => array('success' => 'success update', 'id'=> $id, 'value'=> $_POST['value']),
					)
				);		
	}
/********************************************************************************************************************/		
	public function resetSetting( $id = null )
	{
		( new AppSettings )->resetSetting( $id );
		
		$this->view('rtnData/json', 
					array(
						'json' => array('success' => 'success reset', 'id'=> $id, ),
					)
				);		
	}
/********************************************************************************************************************/		
}//End class