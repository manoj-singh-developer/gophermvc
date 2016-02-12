<?php
	
class Controller {
/***************************************************************************/	
	public function model($model)
	{
		/**
			$model is the class required. The format is subfolder.Classname	
		**/
		$url = str_replace(array('/','.','\\'), '/', $model).'.php';

		$model = str_replace(".", '/', $model);
		$chunks = explode( '/', $model );
		
		$model = end($chunks);
		
		// ADD File check
		if( isset($url) ){
			if( file_exists('../app/models/'.$url) ){
				require_once '../app/models/'.$url;
				return new $model();
			}
		}
		return;
	}
/***************************************************************************/	
	//Render the view
	public function view($view, $data = array() )
	{
		require_once '../app/views/'.$view.'.php';
	}
/***************************************************************************/	
}//End class