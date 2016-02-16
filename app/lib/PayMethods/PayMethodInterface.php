<?php
namespace SMVC\PayMethods;

interface PayMethodInterface{
	
	public function takePayment();
	public function refundPayment();
	
	public function listTransactions();
	
}