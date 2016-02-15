<?php
namespace SMVC\PayMethods;

interface PayMethodsInterface{
	
	public function takePayment();
	public function refundPayment();
	
	public function listTransactions();
	
}