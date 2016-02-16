<?php
header('Content-Type: text/xml');
extract($data);	
if( !empty( $content ) )
{
	echo $content;

}
