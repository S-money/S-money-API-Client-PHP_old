<?php

class UserDemandStatus
{

	public static $userDemandStatus = array(	
										"Incomplete"		=>  0,
										"Pending"			=>	1, 
										"Refused"			=>	2, 
										"Accepted"			=>	3);
	
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