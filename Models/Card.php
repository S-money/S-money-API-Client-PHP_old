<?php

class Id
{
	public $Id;
	public $AppCardId;
	public $NetWork;
	public $Hint;
	public $Name;
	public $Country;
	
	public function __construct()
	{
		$this->Id="";
		$this->AppCardId="";
		$this->NetWork=0;
		$this->Hint="";
		$this->Name="";
		$this->Country;
	}
	
	public function getId() 			{return $this->Id;}
	public function getAppCardId() 		{return $this->AppAppCardId;}
	public function getNetWork()		{return $this->NetWork;}
	public function getHint() 			{return $this->Hint;}
	public function getName()			{return $this->Name;}
	public function getCountry()		{return $this->Country;}
	
	
	public function setId 			($Id) 			{ return ($this->Id=$Id); }
	public function setAppCardId 	($AppCardId) 	{ return ($this->AppCardId=$AppCardId); }
	public function setNetWork 		($NetWork) 		{ return ($this->NetWork=$NetWork); }
	public function setHint 		($Hint) 		{ return ($this->Hint=$Hint); }
	public function setName 		($Name) 		{ return ($this->Name=$Name); }
	public function setCountry 		($Country) 		{ return ($this->Country=$Country); }
   
	public function getAttributes ()
	{
		$list = array (	'Id' 		  => $this->Id, 
						'AppCardId'   => $this->AppCardId, 
						'NetWork' 	  => $this->NetWork, 
						'Hint' 		  => $this->Hint,
						'Name' 		  => $this->Name,
						'Country'     => $this->Country);
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
	
	
	public function init($Id, $AppId, $Network, $Hint, $Name)
	{
		$this->Id=$Id;
		$this->AppId=$AppId;
		$this->Network=$Network;
		$this->Hint=$Hint;
		$this->Name=$Name;
		$this->Country=$Country;
	}
	
	public function initObject($array)
	{
		$this->Id=$array["Id"];
		$this->AppId=$array["AppId"];
		$this->Network=$array["Network"];
		$this->Hint=$array["Hint"];
		$this->Name=$array["Name"];
		$this->Country=$array["Country"];
	}
	
	
}