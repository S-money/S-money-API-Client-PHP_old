<?php


class Attachment
{
	public $Id;
	public $Name;
	public $ContentType;
	public $Size;
	
	public function __construct()
	{
		$this->Id=0;
		$this->Name="";
		$this->ContentType="";
		$this->Size=0;
	}
	
	public function getId() 			{return $this->Id;}
	public function getName() 			{return $this->Name;}
	public function getContentType() 	{return $this->ContentType;}
	public function getSize()			{return $this->Size;}
	
	
	public function setId 			($Id) 			{ return ($this->Id=$Id); }
	public function setName 		($Name) 		{ return ($this->Name=$Name); }	
	public function setContentType 	($ContentType) 	{ return ($this->ContentType=$ContentType); }	
	public function setSize 		($Size) 		{ return ($this->Size=$Size); }
   
	public function getAttributes ()
	{
		$list = array (	'Id' 			=> $this->Id, 
						'Name' 			=> $this->Name, 
						'ContentType' 	=> $this->ContentType,
						'Size' 	  		=> $this->Size);
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
  	
  	
  	public function init($Id, $Name, $ContentType, $Size)
  	{
  		$this->Id			=$Id;
  		$this->Name			=$Name;
  		$this->ContentType	=$ContentType;
  		$this->Size			=$Size;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id			=$array["Id"];
  		$this->Name			=$array["Name"];
  		$this->ContentType	=$array["ContentType"];
  		$this->Size			=$array["Size"];
  	}
  	
  	
}
