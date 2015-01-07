<?php

class EmailContributionNotificationData extends ContributionNotificationData
{

	public $Subject;
	
	public function __construct()
	{
		$this->Subject="";
	}
	
	public function getSubject() 	{return $this->Subject;}

	public function setSubject ($Subject) 		{ return ($this->Subject=$Subject); }
   
	public function getAttributes ()
	{
		$list = array ('Subject' => $this->Subject);
		return $list;
	}
}