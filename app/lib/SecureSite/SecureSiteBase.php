<?php
/**
	Login class.
	Logging in sets two $_SESSION varibles
	$_SESSION['user_id'], $_SESSION['loginString']
	
	Using the login form test the form submit: processLoginForm( $data = array() )
	
	On pages that require login status: getLoginStatus()
	
	Loging out: logoutSession()
	
**/
namespace SMVC\SecureSite;
use \PDO;
	
class SecureSiteBase {
	protected $hash = 'sha512';

//Form input ID's	
	protected $emailID = 'emailAddress';
	protected $passwordID = 'password';
	protected $firstNameID = 'firstName';
	protected $lastNameID = 'lastName';
	
	
	protected $testUsername = 'tony';
	protected $testPassword = 'tony';
	
	protected $inactiveInterval = 500;//Hours inactive before required to log back in. See config for override
		
	public $outputs = array();//Log of SecureSite class activity - use to debug

	protected $LoginStatus = false;//Default login status
	
	protected $framework;//Object for interface
	
/****************************************************************************/
	public function __construct()
	{
	//session_start();
	//if sessions are enabled, but no session exists
		if ( $this->compareStrings(session_status(), PHP_SESSION_NONE) != true )
		{
			return 'Sessions need to be enabled';
		}
		
		session_start();
			
	//session_regenerate_id();
		$_SESSION['id'] = session_id();
	
	//Inactivity duraction value	
		$inactiveInterval = ( INACTIVE_INTERVAL ? INACTIVE_INTERVAL : $this->inactiveInterval);
	
	//Activity log	
		$this->outputs['Process'][] = __CLASS__. __FUNCTION__.' Line:'.__LINE__;
	
	}
/****************************************************************************/

	public function setFramework( SecureSiteInterface $framework)
	{
		$this->framework = $framework;
	}
/****************************************************************************/

	public function loginForm()
	{
		return $this->framework->loginForm($this->emailID, $this->passwordID);
	}
/****************************************************************************/
	
	public function passwordReminderForm()
	{
		return $this->framework->passwordReminderForm($this->emailID);
	}
/****************************************************************************/
	
	public function signupForm()
	{
		return $this->framework->signupForm($this->emailID, $this->passwordID, $this->firstNameID, $this->lastNameID );
	}
/****************************************************************************/
	protected function compareStrings( $s1 = '', $s2 = '')
	{
		return ($s1 == $s2);
	}
/****************************************************************************/
	protected function checkBruteForceAttack()
	{
	/** Activity log **/	
		$this->outputs['Process'][] = __FUNCTION__;	
		return;
	}
/****************************************************************************/
	protected function logBruteForceAttempt()
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

	protected function getLoginString( $user_id = '', $salt = '' )
	{
		$string = $user_id.$_SERVER['HTTP_USER_AGENT'].( $salt ? $salt : $this->newSalt() );
	
	/** Activity log **/	
		$this->outputs[__FUNCTION__]  = __LINE__;	
		
		return $this->hashString($string);
	}
/****************************************************************************/
/**		Connect to database, PDO 	**/
	protected function db_conection()
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
	protected function updateActivityRecord( $userID = null)
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
}//End Class Security	