<?php


class PayRequestStatus
{

	public static $domainPaymentType = array(
										"ToBePayed"		=>0, 
										"Cancelled"		=>1, 
										"Refused"		=>2, 
										"Answered"		=>3);
	public $Value;

	public function __construct($Value)
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

