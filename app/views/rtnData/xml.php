<?php
header('Content-Type: text/plain');
extract($data);	
if( !empty( $content ) )
{
	echo $content;

}
