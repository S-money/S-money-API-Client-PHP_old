<?php

class ContributionNotificationType
{

	public static $contributionNotificationType = array(	
										"None"			=>	0, 
										"SMS"			=>	1, 
										"Email"			=>	2,
										"Facebook"		=>	3);
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