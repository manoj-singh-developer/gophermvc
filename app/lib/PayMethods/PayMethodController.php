<?php
namespace SMVC\PayMethods;


class PayMethodController {
	protected $paymentMethod;
	
/******************************************************************/
	public function __construct( PayMethodsInterface $paymentMethod)
	{
		$this->paymentMethod = $paymentMethod;	
	}
/******************************************************************/
	public function takePayment(){
		
		
	}
/******************************************************************/
	
	public function refundPayment()
	{
		
		
	}
/******************************************************************/	
	
	public function listTransactions(){
		
		
	}
/******************************************************************/
/******************************************************************/
/******************************************************************/
	
}