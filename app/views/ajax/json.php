<?php
	
if( !empty( $data['json']) )
{
	$json = $data['json']; 
	echo json_encode($data['json']);

}

exit();	