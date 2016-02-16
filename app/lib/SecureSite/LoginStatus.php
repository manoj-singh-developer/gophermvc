<?php
namespace Acme\SecureSite;
use \PDO;

class LoginStatus extends SecureSiteBase {
	
	public $status = false;
/****************************************************************************/

	public function __construct($url = null)
	{
		parent::__construct();
	}
/****************************************************************************/

		
	public function getLoginStatus( $url = null )
	{
		$status = false;
		
		if( !empty($_SESSION['loginString']) && !empty($_SESSION['user_id']) ){
	
	/** Query database and return row based on $_SESSION['user_id'] **/
		
			$sql  = " SELECT *,  DATE_SUB(NOW(), INTERVAL ".$this->inactiveInterval." HOUR) as testTime  FROM ". DB_PREFIX ."users ";
			$sql .= " WHERE user_id = :id  ";
			$sql .= " AND lastActivity >= DATE_SUB(NOW(), INTERVAL ".$this->inactiveInterval." HOUR) AND active = 1 ";
			$sql .= " LIMIT 1; ";
			
			$params = array(':id' => $_SESSION['user_id']);
			
			$db = $this->db_conection();
			try
			{
				$pdo = $db->prepare($sql);
				
				$pdo->setFetchMode(PDO::FETCH_ASSOC);
				
				if( $pdo->execute( $params ) ){
					while( $row = $pdo->fetch() )
					{
						extract($row);
						$this->outputs['user details'] = $row;
						
	/**  Check $_SESSION['loginString'] is valid **/
						$validString = $this->getLoginString($user_id, $salt);
						$questionableString = $_SESSION['loginString'];
						
						if( $this->compareStrings($questionableString, $validString) ){
	/** User is logged in **/
							$status = true;
						}
					}
					
				}
				
			}
			catch(PDOException $exception)
			{
				die('ERROR: ' . $exception->getMessage());
			}
			
			$db = null;
			
		}	
	
	/** Activity log **/
	/**/
		$this->outputs[__FUNCTION__]  = __LINE__;
		$this->outputs['Status'] = $status;
		$this->LoginStatus[__FUNCTION__] = $status;
		$this->outputs['Process'][] = __FUNCTION__;
	/**/	
		if( $status == false && $url != null ){
			header("Location: ".$url);
			exit();	
		}
		
		return $status;
	}
/****************************************************************************/

}