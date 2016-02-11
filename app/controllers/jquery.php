<?php
	
use SMVC\Core\DbConnect;
use SMVC\Biometrics\BioController;

	
class Jquery extends Controller
{
/***************************************************************************/		
	public function index()
	{

	}
/***************************************************************************/
	public function getbiometric( $id )
	{
		/** Call View and pass values **/
		$this->view('ajax/json', 
					array(
						'json' => (new BioController)->getBiometricMasterData( $id ),
					)
				);
	}		
/***************************************************************************/
	public function updateEnviromentSettings( $id = null )
	{
		extract($_POST);
		( new AppSettings )->updateSettings( $id, $value );
		
		$this->view('ajax/json', 
					array(
						'json' => array('success' => 'success update', 'id'=> $id, 'value'=> $_POST['value']),
					)
				);		
	}
/***************************************************************************/
	public function resetSetting( $id = null )
	{
		( new AppSettings )->resetSetting( $id );
		
		$this->view('ajax/json', 
					array(
						'json' => array('success' => 'success reset', 'id'=> $id, ),
					)
				);		
	}
/***************************************************************************/
}//End class