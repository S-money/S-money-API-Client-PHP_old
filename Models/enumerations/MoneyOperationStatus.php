<?php

class MoneyOperationStatus
{

	public static $moneyOperationStatus = array(	
		"Pending"           =>  0,
		"Succeeded"         =>	1, 
		"Refund"            =>	2, 
		"Failed"            =>	3,
		"WaitingValidation" =>	4
	);
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
	
	public function encodeJSON()
	{
		foreach ($this as $key => $value)
			$json->$key = $value;
		return json_encode($json);
	}
	
	
	public function init($Value)
	{
		$this->Value=$Value;
	}
	
	
	public function initObject($array)
	{
		$this->Value=$array["Value"];
	}
	
}