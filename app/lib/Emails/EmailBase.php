<?php
namespace Acme\Emails;
//use Mailchimp;

class EmailBase{
	
	protected $mailer;
	public $emailErrors;
/******************************************************************/
	
	public function __construct( EmailInterface $mailer)
	{
		$this->mailer = $mailer;	
	}
/******************************************************************/
	
	public function subscribe( $listName, $emailAddress )
	{	
		$this->mailer->subscribeTo( $listName, $emailAddress );
		$this->emailErrors = $this->mailer->errors;
		
		return;
	}
/******************************************************************/
	public function unsubscribe( $listName, $emailAddress )
	{
		$this->mailer->subscribeTo( $listName, $emailAddress );
		$this->emailErrors = $this->mailer->errors;
		
		return;
	}
/******************************************************************/
	public function testEmail( $campaignID, $emailAddress )
	{
		$this->mailer->sendEmailTest( $campaignID, $emailAddress );
		$this->emailErrors = $this->mailer->errors;
		
		return;
	}
/******************************************************************/
}
