<?php

class TokenType
{
	public static $tokenType = array(
								"Bearer"	=>1, 
								"Mac"		=>2);
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

