<?php
namespace SMVC\PayMethods\PayPal;
use SMVC\PayMethods\PayMethodInterface;


class Transactions implements PayMethodInterface {

/******************************************************************/
	
	public function takePayment()
	{
		
		return __CLASS__. '->'.__FUNCTION__;
	}
/******************************************************************/

	public function refundPayment(){
		
		
	}
/******************************************************************/
	
	public function listTransactions()
	{
		
		
	}
/******************************************************************/

}