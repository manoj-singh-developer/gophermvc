<?php
namespace SMVC\SecureSite;	


class LoginForm extends SecureSiteController{

/****************************************************************************/
	public function __construct()
	{
		parent::__construct();
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

}