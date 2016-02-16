<?php
use Acme\Core\Security;

class Home extends Controller
{
/********************************************************************************************************************/		
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
/********************************************************************************************************************/		
	
	public function about()
	{

	/** Check login status **/
		//(new Security)->getLoginStatus(BASE_URL."/login/index");
		
	/** Call View and pass values **/				
		$this->view('pages/blank', 
				array(	
					
					)
				);			
	}
/********************************************************************************************************************/		
	
	public function test_txt()
	{

	/** Check login status **/
		//(new Security)->getLoginStatus(BASE_URL."/login/index");
		
	/** Call View and pass values **/				
		$this->view('rtnData/txt', 
				array(	
					'name'=> 'http://localhost/gophermvc/home/testpdf.pdf',
					'content'=> 'hello world. '.__METHOD__,
					)
				);			
	}
/********************************************************************************************************************/		
}//End class