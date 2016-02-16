<?php
namespace Acme\SecureSite;

interface SecureSiteInterface {
	
	public function loginForm($emailID, $passwordID);
	public function passwordReminderForm($emailID);
	public function signupForm($emailID, $passwordID, $firstName, $lastName );
/***************************************************************************/		
}		