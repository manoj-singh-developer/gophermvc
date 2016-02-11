<?php
use SMVC\Core\DbConnect;
use SMVC\Core\Security;
	
class Login extends Controller{
/***************************************************************************/		
	public function index( $url = array() ){
	
	//if( isset($_POST['submitLoginForm']) ){//The login form has been sent
		
		if( (new Security)->processLoginForm( $_POST ) == true ){//Process the login form
			header("Location: ".BASE_URL."/home/index");
			exit();
			$tt = 'Logged in';
		}
		
	//}
	
		$testLogin = new Security;
		$testLogin->logoutSession();
		
		$this->view('login/loginForm', 
			array(
				//'loginData' => $testLogin->outputs,
				//'LOGIN STATUS' => $testLogin->LoginStatus,
				//'Session' => $_SESSION,
				'form' => $testLogin->loginForm(),		
			)
			);
	}
		
/***************************************************************************/
public function logOut(){

	$logout = new Security;
	$logout->logoutSession();
	
	header("Location: ".BASE_URL."/login/");
	exit();	
	
}
/***************************************************************************/
public function processForgotPasswordForm(){
	


}
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
}//End class