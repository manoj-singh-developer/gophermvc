<?php
	
class App extends BaseController{
	
	
	protected $controller = 'home';//Default controller
	protected $method = 'index';//Default method
	protected $params = array();//Parameters
	
/***************************************************************************/	
	public function __construct()
	{
		
		parent::__construct();
		
		$url = $this->parseUrl();
	
	//Controller
	/**
		Notice that $url is all in lower case. This prevents issues with some servers treating UpperAndLower case differently	
	**/	
		if( file_exists('../app/controllers/'.strtolower( $url[0] ) .'.php') ){
			$this->controller = strtolower( $url[0] );
			unset($url[0]);
			
		}
		
		require_once '../app/controllers/'.$this->controller.'.php';
		
		$this->controller = new $this->controller;
		//var_dump($this->controller);
		
		//Method
		if( isset($url[1]) ){
			$url[1] = str_replace('.','_',$url[1]);
			if( method_exists($this->controller, $url[1] ) ){//Replace output.pdf as output_pdf
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		//array_values = resets array keys starting at 0
		$this->params = $url ? array_values($url) : array() ;
		//$this->params = array( print_r(array_values($url), true) ) ;
		
		//$this->params = $url;
		call_user_func_array( array($this->controller, $this->method), $this->params );
	}
/***************************************************************************/	
	public function parseUrl()
	{
		
		if( isset($_GET['url']) ){
			
			//Trim, sanitize and explode URL
			return $url = explode( '/', filter_var( rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL) );
		}
	}
/***************************************************************************/	
}//End class