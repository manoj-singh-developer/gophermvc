<?php
use SMVC\Core\DbConnect;

class AppSettings {

/***************************************************************************/
	public function updateSettings( $id, $value )
	{
		error_log( $id .'--'.$value.__METHOD__ );
		
		$sql = " UPDATE ".DB_PREFIX."environment SET environment_value = :value WHERE environment_id = :id; ";
		$params = array(':id' => $id, ':value' => $value );
		
		$this->CRUD( $sql, $params);
		return;
	}
/***************************************************************************/
	public function resetSetting( $id = null , $value = null )
	{
		$params = array();
		$sql = " UPDATE ".DB_PREFIX."environment SET environment_value = environment_default ";
		
		if( $id != null )
		{
			$sql .= " WHERE environment_id = :id; ";
			$params = array(':id' => $id );
		}
		
		$this->CRUD( $sql, $params);
		return;
	}
/***************************************************************************/
	public function CRUD($sql, $params)
	{
		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			if( $pdo->execute($params) ){
				$data['rowCount'] = $pdo->rowCount();
			}
		
		}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
		return $data;
	}
/***************************************************************************/

}	