<?php
namespace SMVC\PayMethods\Sagepay;

class Transactions implements PayMethodsInterface {
	
	public function takePayment();
	public function refundPayment();
	
	public function listTransactions();
}