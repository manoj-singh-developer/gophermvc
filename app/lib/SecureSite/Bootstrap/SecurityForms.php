<?php
namespace SMVC\SecureSite\Bootstrap;
use SMVC\SecureSite\SecureSiteInterface;	


class SecurityForms implements SecureSiteInterface{
	public $testEmail = 'tony';
	public $testPassword = 'tony';
	
/****************************************************************************/
	public function loginForm($emailID = 'email', $passwordID = 'password')
	{
		ob_start();
		?>
		
		<form role="form" action="" method="post" id="loginForm" name="loginForm">
			<h3>Login</h3>
			<div class="form-group">
				<label for="<?=$emailID?>">User name:</label>
				<input type="text" class="form-control" id="<?=$emailID?>" name="<?=$emailID?>" value="<?=$this->testEmail?>">
			</div>
	
			<div class="form-group">
				<label for="<?=$passwordID?>">Password:</label>
				<input type="text" class="form-control" id="<?=$passwordID?>" name="<?=$passwordID?>" value="<?=$this->testPassword?>">
			</div>	
			
			<button type="submit" class="btn btn-default" id="submitLoginForm" name="submitLoginForm">Go</button>	
		</form>
		
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		
		return $content;

	}
/****************************************************************************/
	
	public function passwordReminderForm($emailID = 'email')
	{
		ob_start();
		?>
		<form role="form" action="" method="post">
			<h3>Forgotten password?</h3>
			<div class="form-group">
				<label for="emailAddress">Email address:</label>
				<input type="email" class="form-control" id="emailAddress" name="emailAddress">
			</div>
			
			<button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">Send reset link</button>
	
		</form>
		<?php
		$html = ob_get_contents();
		ob_get_clean();
			
		return $html;		
	}
/****************************************************************************/
	
	public function signupForm($emailID = 'email', $passwordID = 'password', $firstName = 'firstName', $lastName = 'lastName' )
	{
		ob_start();
		?>
		<form role="form" action="" method="post">
			<h3>Sign up</h3>
			<div class="form-group">
				<label for="<?=$firstName?>">First name:</label>
				<input type="text" class="form-control" id="<?=$firstName?>" name="<?=$firstName?>">
			</div>

			<div class="form-group">
				<label for="<?=$lastName?>">Last name:</label>
				<input type="text" class="form-control" id="<?=$lastName?>" name="<?=$lastName?>">
			</div>
			
			<div class="form-group">
				<label for="<?=$emailID?>">Email:</label>
				<input type="email" class="form-control" id="<?=$emailID?>" name="<?=$emailID?>">
			</div>
			
			<div class="form-group">
				<label for="<?=$passwordID?>">Password:</label>
				<input type="password" class="form-control" id="<?=$passwordID?>" name="<?=$passwordID?>">
			</div>								
		
			<button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">Go</button>
		
		</form>
		
		<?php
		$html = ob_get_contents();
		ob_end_clean();
		
		return $html;	
	}
/****************************************************************************/
}