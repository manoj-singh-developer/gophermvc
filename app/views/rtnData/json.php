<?php
header('Content-Type: application/json');
	
if( !empty( $data['json']) )
{
	$json = $data['json']; 
	echo json_encode($data['json']);

}

exit();	