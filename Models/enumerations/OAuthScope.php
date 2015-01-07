<?php

class OAuthScope
{

	public static $oAuthScope = array(	
										"None"					=>	0, 
										"Users_Details"			=>	1, 
										"Users_Edit"			=>	2,
										"SubAccounts_Details"	=>	4,
										"SubAccounts_Create"	=>	8,
										"BankAccounts_Details"	=>	16,
										"BankAccounts_Create"	=>	32,
										"CBCards_Details"		=>	64,
										"CBCards_Create"		=>	128,
										"History"				=>	256,
										"KYC"					=>	512,
										"MoneyOut"				=>	1024,
										"MoneyIn"				=>	2048,
										"PayOut"				=>	4096,
										"PayIn"					=>	8192,
										"Payments"				=>	16384,
										"PaymentRequests"		=>	32768,
										"CguAcceptance"			=>	65536,
										"All"					=>	131071);
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