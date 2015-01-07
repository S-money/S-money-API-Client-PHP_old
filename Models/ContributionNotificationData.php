<?php

class ContributionNotificationData
{
	public $Type;
	public $Body;
	
	public function __construct()
	{
		$this->Type= new ContributionNotificationType();
		$this->Body="";
	}
	
	public function getType() 	{return $this->Type;}
	public function getBody() 	{return $this->Body;}

	
	
	public function setType 		($Type) 		{ return ($this->Type=$Type); }
	public function setBody 		($Body) 		{ return ($this->Body=$Body); }
   
	public function getAttributes ()
  {
	$list = array ('Type' 	=> $this->Type, 
				   'Body' 	  	=> $this->Body);
	return $list;
  }
}