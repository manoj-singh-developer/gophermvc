<?php
namespace SMVC\Emails;

interface EmailInterface{
	
	public function subscribeTo( $listName, $emailAddress );
	public function unsubscribeFrom( $listName, $emailAddress );
	public function transactionalEmail( $emailAddress );//Email to just one recipient
	public function sendEmailTest(  $campaignID, $emailAddress );//Email test to one recipient
	public function sendEmail( $listName, $emailAddress );
	
}