<?php
namespace Acme\Biometrics;
use Acme\Core\DbConnect;
use PDO;
use Exception;

class BioController {
	
	protected $biometricLogger;
	protected $userID;
	protected $defaultUnit = 'Reps';

/****************************************************************************/
	protected function runAddNewMetric( $params = array() ){
		
		$initialValue = $params[':metricValue'];
		unset($params[':metricValue']);

		$sql  = " INSERT INTO ".DB_PREFIX."master  ";
		$sql .= " ( master_id, user_id, name, metricGrouping, goalDate, goalValue, status, biometricType_id, infoLink ) ";
		$sql .= " VALUES ";
		$sql .= " ( NULL, :userID, :name, :metricGrouping, :goalDate, :goalValue, :status, :biometricType_id, :infoLink ) ";

		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			if( $pdo->execute($params) ){
				$masterID = $db->lastInsertId();
				$this->processNewDataRow( array(':id'=> $masterID , ':value'=> $initialValue ) );
			}
		
			}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
		return;
	}
/****************************************************************************/
	protected function runUpdateMetric($params = array())
	{
		$data = array();
	
		$sql  = " UPDATE ".DB_PREFIX."master ";
		$sql .= " SET ";
		$sql .= " name = :name, ";
		$sql .= " goalValue = :goalValue, ";
		$sql .= " biometricType_id = :biometricType_id, ";
		$sql .= " infoLink = :infoLink ";
		$sql .= " WHERE master_id = :master_id; ";
	
		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			$pdo->execute($params);
		
			}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
		
		return;
	}
/****************************************************************************/
	public function getComboListBiometrics( $data )
	{
		extract($data);
		$list = $this->arrayOfBiometrics();
		$html = '';
		
		ob_start();
		?>
		<select class="form-control" id="<?=($id ? $id : '')?>" name="<?=($id ? $id : '')?>" >
		<?php
			foreach($list as $k => $v )
			{
			
			echo '<option value="'.$k.'" '.($k == $selected ? 'selected' : '').'>'.$v.'</option>'.PHP_EOL;	
				
			}
		?>
		</select>
		<?php
		$html = ob_get_contents();
		ob_end_clean();	
		
		return $html;
		
	}
/****************************************************************************/

	protected function processNewDataRow( $params = array() )
	{
		
		$sql = " INSERT INTO ".DB_PREFIX."data  ( data_id, master_id, dataDate, dataValue )  VALUES ( NULL, :id, NOW(), :value );";
		
		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			$pdo->execute($params);
					
		}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
			
		return;
	}

/****************************************************************************/
	public function getBiometricMasterData( $id = null )
	{
		$data = array();
		
		$params = array( ':id' => $id );
	
		$sql = " SELECT * FROM ".DB_PREFIX."master WHERE master_id = :id; ";
			
		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			if( $pdo->execute($params) ){
				while( $row = $pdo->fetch() ){
					$row['initiaValue'] = $this->getMetricInitialValue($id);
					$data = $row;
				}
			}
		
			}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
			
		return $data;
	}
/****************************************************************************/
	public function WhatUnits( $id = null )
	{
		$class = $this->defaultUnit;
		
		$params = array(':id' => $id);
	
		$sql = " SELECT * FROM ".DB_PREFIX."master ";
		$sql .= " LEFT JOIN ".DB_PREFIX."biometric_types ON ".DB_PREFIX."master.biometricType_id = ".DB_PREFIX."biometric_types.biometricType_id ";
		$sql .= " WHERE master_id = :id;";
			
		$db = (new DbConnect)->db_conection();
			
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			if( $pdo->execute($params) ){
				while( $row = $pdo->fetch() ){
					extract($row);
					$class = $biometricType;
				}
			}
		
		}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
			
		return $class;
		
	}
/****************************************************************************/
	protected function BootStrapPanel() 
	{
		ob_start();
		?>
		
		<div class="panel panel-default">
		  <div class="panel-heading"><?=$this->panelHeader?></div>
		  <div class="panel-body"><?=$this->panelBody?></div>
		</div>
		
		<?php
		$html = ob_get_contents();
		ob_end_clean();	
		
		return $html;
	}
/****************************************************************************/
	protected function arrayOfBiometrics()
	{
		$data = array();
		
		$params = array();
	
		$sql = " SELECT *, biometricType_id as id FROM ".DB_PREFIX."biometric_types ORDER BY ".DB_PREFIX."biometric_types.biometricType DESC; ";
			
		$db = (new DbConnect)->db_conection();
		
		try{
			$pdo = $db->prepare($sql);
			$pdo->setFetchMode(PDO::FETCH_ASSOC);
			
			if( $pdo->execute($params) ){
				while( $row = $pdo->fetch() ){
					extract($row);
					$data[$id] = $biometricType;
				}
			}
		
		}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
		
		$db = null;
		return $data;
	}	
/****************************************************************************/
	protected function getMetricInitialValue( $id = null )
	{
			$data = '';
			
			$params = array( ':id' => $id );
		
			$sql = " SELECT dataValue as initialValue FROM ".DB_PREFIX."data WHERE master_id = :id ORDER BY dataDate ASC LIMIT 1; ";
				
			//$db = db_conection();	
			$db = (new DbConnect)->db_conection();
			
			try{
				$pdo = $db->prepare($sql);
				$pdo->setFetchMode(PDO::FETCH_ASSOC);
				
				if( $pdo->execute($params) ){
					while( $row = $pdo->fetch() ){
						$data = $row['initialValue'];
					}
				}
			
				}catch(PDOException $exception){  die('ERROR: ' . $exception->getMessage()); }
			
			$db = null;
			
			return $data;
	}
/****************************************************************************/

}	
