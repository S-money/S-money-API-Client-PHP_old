<?php

class Civility
{

	public static $civility = array(	
										"Empty"		=> -1,
										"Mr"		=>	0, 
										"Mrs"		=>	1, 
										"Miss"		=>	2);
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
	
	
	public function init($Id, $AppAccountId, $Amount, $DisplayName, $IsDefault)
	{
		$this->Value=$Value;
	}
	
	
	public function initObject($array)
	{
		$this->Value=$array["Value"];
	}
	
}