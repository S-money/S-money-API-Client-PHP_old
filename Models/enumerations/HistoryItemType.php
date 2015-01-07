<?php

class HistoryItemType
{
	public static $historyItemType = array(
										"Payment"				=>0, 
										"MoneyIn"				=>1, 
										"MoneyOut"				=>2, 
										"EcommercePayment"		=>3, 
										"EcommerceCardPayment"	=>4, 
										"VendingMachinePayment"	=>5, 
										"Commission"			=>6, 
										"Refund"				=>7, 
										"Regulation"			=>8);
	public $Value;

	public function __construct($Value = null)
	{
		$this->Value=$Value;
	}
	
	public function getValue() 			{return $this->Value;}

	public function setValue ($Value) 	{ return ($this->Value=$Value); }
  
	public function getAttributes()
	{
		$list = array ('Value' => $this->Value);
		return $list;
	}
} 

