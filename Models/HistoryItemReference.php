<?php

class HistoryItemReference
{
	public $Id;
	public $Type;
	public $href;
	
	public function __construct()
	{
		$this->Id=0;
		$this->Type= new HistoryItemType();
		$this->href="";
	}
	
	public function getId() 		{return $this->Id;}
	public function getType() 		{return $this->Type;}
	public function gethref()		{return $this->href;}
	
	
	public function setId 		($Id) 		{ return ($this->Id=$Id); }	
	public function setType 	($Type) 	{ return ($this->Type=$Type); }	
	public function sethref 	($href) 	{ return ($this->href=$href); }
   
	public function getAttributes ()
	{
		$list = array ('Id' 		=> $this->Id, 
				       'Type' 	  	=> $this->Type,
				       'href' 	  	=> $this->href);
		return $list;
	}
	
  	public function encodeJSON()
  	{
  	    $json = new StdClass();
  		foreach ($this as $key => $value){
  			$lowerKey = strtolower($key);
  			$json->$lowerKey = $value;
  		}
  		return json_encode($json);
  	}
  	
  	
  	
  	public function init($Id, $Type, $href)
  	{
  		$this->Id	=$Id;
  		$this->Type	=$Type;
  		$this->href	=$href;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id	=$array["Id"];
  		$this->Type	=$array["Type"];
  		$this->href	=$array["href"];
  	}
  	
  	
}

