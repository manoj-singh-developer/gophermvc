<?php
namespace SMVC\PayMethods;
//use SMVC\PayMethods\PayMethodInterface;

class PayMethodBase {
	protected $paymentMethod;
	
/******************************************************************/
	public function __construct( PayMethodInterface $paymentMethod)
	{
		$this->paymentMethod = $paymentMethod;	
	}
/******************************************************************/
	public function takePayment(){
		
		return $this->paymentMethod->takePayment();
	}
/******************************************************************/
	
	public function refundPayment()
	{
		
		
	}
/******************************************************************/	
	
	public function listTransactions(){
		
		
	}
/******************************************************************/
}