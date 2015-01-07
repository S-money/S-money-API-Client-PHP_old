<?php

class ContributionNotification
{
	public $List;
	public $Href;
	
	public function __construct()
	{
		$this->List= array();
		$this->Href="";
	}
	
	public function getList() 	{return $this->List;}
	public function getHref() 	{return $this->Href;}

	
	
	public function setList 		($List) 		{ return ($this->List=$List); }
	public function setHref 		($Href) 		{ return ($this->Href=$Href); }
   
	public function getAttributes ()
  {
	$list = array ('List' 	=> $this->List, 
				   'Href' 	  	=> $this->Href);
	return $list;
  }
}