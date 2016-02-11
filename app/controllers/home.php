<?php
use SMVC\Core\Security;

class Home extends Controller
{
/************************************************************************************************************************************************************/		
	public function index($v = null, $v2 = null )
	{
		
	/** Check login status **/
		//(new Security)->getLoginStatus( BASE_URL."/login/index" );
	
	/** Call View and pass values **/
		$this->view('pages/home', 
				array(
					'exampleText' => 'Some text here.',
					'from-url' => $v,
					'again-from-url' => $v2,
					)
				);
	}
/************************************************************************************************************************************************************/
	
	public function about()
	{

	/** Check login status **/
		//(new Security)->getLoginStatus(BASE_URL."/login/index");
		
	/** Call View and pass values **/				
		$this->view('pages/home', 
				array(	
					
					)
				);			
	}
/***************************************************************************/
}//End class