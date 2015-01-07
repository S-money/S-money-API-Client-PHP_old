<?php

class HistoryItemStatus
{

	public static $historyItemStatus = array(
										"Pending"		=>0, 
										"Succeeded"		=>1, 
										"Cancelled"		=>2, 
										"Failed"		=>3, 
										"Expired"		=>4, 
										"Refunded"		=>5);
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