<?php
namespace Acme\SecureSite;
use \PDO;


class ProcessLogin extends SecureSiteBase{

/****************************************************************************/
	public function loggedIn( $data = array() )
	{
		/**
			$data array(
				$this->formFieldName => username
				$this->formFieldPassword => password
			)	
			
		**/
		parent::__construct();

		return $this->processLoginRequest($data);
	}
/****************************************************************************/
	protected function processLoginRequest( $data = array() )
	{
		
		$status = false;
		if( !empty($data))
		{
			$db = $this->db_conection();
			
		/** Activity log **/	
			$this->outputs['user stuff'] = 'set';
			
		/** Query database and return row based on $_SESSION['user_id'] **/	
			$sql = " SELECT *, DATE_SUB(NOW(), INTERVAL ".$this->inactiveInterval." HOUR) as testTime FROM ".DB_PREFIX."users WHERE username = :username  AND active = 1 ; ";
			$params = array(':username' => $data[$this->emailID]);
		
			try
			{
				$pdo = $db->prepare($sql);
				$pdo->setFetchMode(PDO::FETCH_ASSOC);
				$pdo->execute($params);
				$row = $pdo->fetch();
				
				if(!empty($row) ){/** No columns == no result set **/
					
					extract($row);
					
		/** Activity log **/			
					$this->outputs['user details'] = $row;
					
		/** Hash password and compare with database password **/
					$pw = $this->hashString( $data[$this->passwordID].$salt );
					
		/** Activity log **/		
					$this->outputs['DB password'] = $password;
					$this->outputs['Form password'] = $pw;
			
		/** Compare hashed passwords **/
					if( $this->compareStrings($pw, $password) )
					{
		/** Log in success **/
					
		/** UPDATE activity **/
						$this->updateActivityRecord($user_id);
						
		/** Set $_SESSION **/
						$status = true;
						$_SESSION['user_id'] = $user_id ;
						$_SESSION['loginString'] = $this->getLoginString( $user_id , $salt);
			
		/** Activity log **/			
						$this->outputs['report'] = 'Login success '.__LINE__;
									
					}
								
				}
				
				if(empty($row))
				{
					$this->checkBruteForceAttack();
				}
			
			}catch(PDOException $exception)
			{
				die('ERROR: ' . $exception->getMessage()); 
					
			}
			
			$db = null;
		
		/** Activity log **/	
			$this->LoginStatus[__FUNCTION__] = $status;
			$this->outputs['Process'][] = __FUNCTION__;
			$this->outputs['Post'] = $_POST;
		}
		return $status;
	}

/****************************************************************************/

}