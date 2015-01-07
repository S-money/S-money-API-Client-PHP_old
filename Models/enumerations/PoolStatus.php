<?php

class PoolStatus
{


	public static $poolStatus = array(
									"InProgress"	=>0, 
									"Expired"		=>1, 
									"Closed"		=>2);
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

