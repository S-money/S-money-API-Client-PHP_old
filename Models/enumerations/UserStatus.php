<?php

class UserStatus
{

	public static $userStatus = array(	
										"Inactive"			=> -1,
										"Unconfirmed"		=>	0, 
										"Ok"				=>	1, 
										"Frozen"			=>	2,
										"OnTheFly"			=>	3,
										"PendingClosing"	=>	4,
										"Closed"			=>	5);
	
	public $Value = null;

	public function __construct($Value = 0)
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