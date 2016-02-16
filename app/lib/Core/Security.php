<?php
	/**
	Login class.
	Logging in sets two $_SESSION varibles
	$_SESSION['user_id'], $_SESSION['loginString']
	
	Using the login form test the form submit: processLoginForm( $data = array() )
	
	On pages that require login status: getLoginStatus()
	
	Loging out: logoutSession()
	
		
	**/
namespace Acme\Core;
use \PDO;
	
class Security {
	protected $hash = 'sha512';
	protected $formFieldName = 'userName';
	protected $formFieldPassword = 'password';
	protected $testUsername = 'tony';
	protected $testPassword = 'tony';
	protected $inactiveInterval = INACTIVE_INTERVAL;//Hours inactive before required to log back in
	
	
	public $outputs = array();
	public $LoginStatus = false;
	
	
/****************************************************************************/
	function __construct()
	{
		//session_start();
		if ( $this->compareStrings(session_status(), PHP_SESSION_NONE) )
		{
			session_start();
		}
		
		//session_regenerate_id();
		$_SESSION['id'] = session_id();
	
	/** Activity log **/	
		$this->outputs['Process'][] = __FUNCTION__;
	
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
		$this->outputs[__FUNCTION__]  = __LINE__;
		$this->outputs['Status'] = $status;
		$this->LoginStatus[__FUNCTION__] = $status;
		$this->outputs['Process'][] = __FUNCTION__;
		
		if( $status == false && $url != null ){
			header("Location: ".$url);
			exit();	
		}
		
		return $status;
	}	
/****************************************************************************/
	private function compareStrings( $s1 = '', $s2 = '')
	{
		return ($s1 == $s2);
	}
/****************************************************************************/
	public function processLoginForm( $data = array() )
	{
		
		$status = false;
		if( !empty($data))
		{
			$db = $this->db_conection();
			
		/** Activity log **/	
			$this->outputs['user stuff'] = 'set';
			
		/** Query database and return row based on $_SESSION['user_id'] **/	
			$sql = " SELECT *, DATE_SUB(NOW(), INTERVAL ".$this->inactiveInterval." HOUR) as testTime FROM ".DB_PREFIX."users WHERE username = :username  AND active = 1 ; ";
			$params = array(':username' => $_POST[$this->formFieldName]);
		
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
					$pw = $this->hashString( $_POST[$this->formFieldPassword].$salt );
					
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
	private function checkBruteForceAttack()
	{
	/** Activity log **/	
		$this->outputs['Process'][] = __FUNCTION__;	
		return;
	}
/****************************************************************************/
	private function logBruteForceAttempt()
	{
		
		
	}
/****************************************************************************/
/**
	This method gets a salt string, its a public method so it might be used when add/editing users passowrds 
**/
	public function getSalt()
	{
		
	    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$this->outputs[__FUNCTION__]  = __LINE__;
		$this->outputs['new_salt'] = $random_salt;
		
		return $random_salt;
	}
/****************************************************************************/
/**
	This method 'hashes' a string, its a public method so it might be used when add/editing users passowrds 
**/	
	public function hashString( $string = '' )
	{
		
		$hashedString = hash( $this->hash, $string );
		
	/** Activity log **/	
		$this->outputs[__FUNCTION__]  = __LINE__;
		
		return $hashedString;
	}
/****************************************************************************/
	public function logoutSession()
	{
	/**  Unset all session variables. unset($_SESSION) would destroy the $_SESSION super global **/
		unset($_SESSION['user_id'], $_SESSION['loginString']);
		session_unset();
		
		return;
	}
/****************************************************************************/

	private function getLoginString( $user_id = '', $salt = '' )
	{
		
		$string = $user_id.$_SERVER['HTTP_USER_AGENT'].( $salt ? $salt : $this->newSalt() );
	
	/** Activity log **/	
		$this->outputs[__FUNCTION__]  = __LINE__;	
		
		return $this->hashString($string);
	}
/****************************************************************************/
/**		Connect to database, PDO 	**/
	private function db_conection()
	{
		
		$conn = '';
	
		try{
			$conn = new PDO("mysql:host=". HOST .";dbname=". DB_NAME, DB_USER, DB_PASSWORD);
	// set the PDO error mode to exception
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		}
		catch(PDOException $exception){
		    $_SESSION['MSG'] = "Connection error: " . $exception->getMessage();
		}
		
		return $conn;
	}
/****************************************************************************/
	private function updateActivityRecord( $userID = null)
	{
			$sql = " UPDATE ".DB_PREFIX."users SET lastActivity = NOW() WHERE user_id = :id ; ";
			$params = array(':id' => $userID);
				
			$db = $this->db_conection();	
			try{
				$pdo = $db->prepare($sql);
				$pdo->setFetchMode(PDO::FETCH_ASSOC);
				
				$pdo->execute($params);
				
			}
			catch(PDOException $exception)
			{
				die('ERROR: ' . $exception->getMessage());
			}
			
			$db = null;
		
		return;
	}	
/****************************************************************************/
/****************************************************************************/
	public function newUserForm()
	{
		ob_start();
		?>
		
		<form role="form" action="" method="post" id="newUser" name="newUser">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" id="<?=$this->formFieldName?>" name="<?=$this->formFieldName?>" value="">
			</div>
				
			<button type="submit" class="btn btn-default" id="forgotEmailBtn" name="forgotEmailBtn">Add user</button>
			
		</form>
		
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
/****************************************************************************/
	public function loginForm()
	{
		ob_start();
		?>
		
		<form role="form" action="" method="post" id="loginForm" name="loginForm">
			<div class="form-group">
				<label for="userName">User name:</label>
				<input type="text" class="form-control" id="<?=$this->formFieldName?>" name="<?=$this->formFieldName?>" value="<?=$this->testUsername?>">
			</div>
	
			<div class="form-group">
				<label for="userName">Password:</label>
				<input type="text" class="form-control" id="<?=$this->formFieldPassword?>" name="<?=$this->formFieldPassword?>" value="<?=$this->testPassword?>">
			</div>	
			
			<button type="submit" class="btn btn-default" id="submitLoginForm" name="submitLoginForm">Go</button>	
		</form>
		
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		
		return $content;
	}
/****************************************************************************/	
/****************************************************************************/	
}//End Class Security	