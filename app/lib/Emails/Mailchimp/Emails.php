<?php
	
namespace SMVC\Emails\Mailchimp;
use SMVC\Emails\EmailInterface;
use Mailchimp;

/**
	
   //https://apidocs.mailchimp.com/
   
   Mailchimp Campaign ID. 
   	Send test email and look at headers.
   	X-Campaign: mailchimp60b3b2b4fd7f51394eac38ac1.d455ea1574
   	
   	The Campaign ID is in the above case 'd455ea1574'
   	
   	Or
   	In Mailchimp view the email in Campaign Preview.
   		Right click on email and right click->view frame source
   		
   		Search for something similar to: [UNIQID]&c=d455ea1574
   
**/

class Emails implements EmailInterface {
	
	protected $Mailchimp;
	public $errors = array();

/***************************************************************************/
	
	public function __construct()
	{
		/**
			Mailchimp needs its API either as the first value with a new class instance or will look in environment values ( not defined ones )
			putenv("MAILCHIMP_APIKEY=a6db84dc204d4720c0c450a0bbac5b4f-us12");
		**/
		$this->Mailchimp = new Mailchimp;
	}

/***************************************************************************/
	
	public function subscribeTo(  $listName, $emailAddress )
	{
		try
		{
		 	$this->Mailchimp->lists->subscribe(
						$listName, //'4c0e17c245', //$listName
						array('email'=> $emailAddress),
						null, //Merge vars
						'html', //Email type
						false, //require double opt in
						true //update existing contact
						);
		}
		catch(\Mailchimp_Error $e)
		{
			if ($e->getMessage()) {
                $this->errors[] = $e->getMessage();
            } else {
                $this->errors[] = 'An unknown error occurred';
            }
		}
		return;
	}


/***************************************************************************/
	
	public function unsubscribeFrom(  $listName, $emailAddress )
	{
		try
		{
		return $this->Mailchimp->lists->unsubscribe(
						$listName, //'4c0e17c245', //$listName
						array('email'=> $emailAddress),
						null, //Merge vars
						false, //delete permanently
						false, //send goodbye email
						false //send unsubscribe notification email
						);
			}
		catch(\Mailchimp_Error $e)
		{
			if ($e->getMessage()) {
                $this->errors[] = $e->getMessage();
            } else {
                $this->errors[] = 'An unknown error occurred';
            }
		}
		return;

	}

/***************************************************************************/

	public function transactionalEmail( $emailAddress )
	{
		/**
			
			Mailchimp does not do Transactional 'one to one' emails
			
		**/
		try
		{
			
		}
		catch(\Mailchimp_Error $e)
		{
			
		}
		
	}

/***************************************************************************/
	
	public function sendEmailTest(  $campaignID, $emailAddress )
	{
		try
		{
			$email = $this->Mailchimp->campaigns->sendTest(
						$campaignID, //'4c0e17c245', //$listName
						array('email'=> $emailAddress),
						'html' //Email type
						);
		}
		catch(\Mailchimp_Error $e )
		{
			
			if ($e->getMessage()) {
                $this->errors[] = $e->getMessage();
            } else {
                $this->errors[] = 'An unknown error occurred';
            }
	
		}
		
		return;
		
	}
	
/***************************************************************************/

	public function sendEmail( $listName, $emailAddress )
	{
		
		
	}
/***************************************************************************/
	
}
