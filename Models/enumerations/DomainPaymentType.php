<?php


class DomainPaymentType
{

	public static $domainPaymentType = array(
										"In"		=>0, 
										"Out"		=>1, 
										"InRefund"	=>2, 
										"OutRefund"	=>3);
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

