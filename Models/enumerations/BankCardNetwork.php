<?php

class BankCardNetWork
{

	public static $bankCardNetWork = array(	
										"UNKNOWN"		=> -1,
										"AMEX"			=>	0, 
										"CB"			=>	1, 
										"MASTERCARD"	=>	2,
										"VISA"			=>	3,
										"MAESTRO"		=>	4,
										"ECARTEBLEUE"	=>	5,
										"AUROREMULTI"	=>	6,
										"BUYSTER"		=>	7,
										"COFINOGA"		=>	8,
										"JCB"			=>	9,
										"ONEY"			=>	10,
										"ONEY_SANBOX"	=>	11,
										"PAYPAL"		=>	12,
										"PAYPAL_SB"		=>	13,
										"PAYSAFECARD"	=>	14,
										"VISA_ELECTRON"	=>	15,
										"COF3XCB"		=>	16,
										"COF3XCB_SB"	=>	17);
	public $Value;

	public function __construct($Value)
	{
		$this->Value=$Value;
	}
	
	public function getValue() 			{return $this->Value;}

	public function setValue ($Value) 	{return ($this->Value=$Value); }
  
	public function getAttributes()
	{
		$list = array ('Value' => $this->Value);
		return $list;
	}
	
}