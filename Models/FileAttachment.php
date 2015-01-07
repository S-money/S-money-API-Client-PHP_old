<?php


class FileAttachment
{
	public $Id;
	public $Name;
	public $Type;
	public $Size;
	public $Content; //Objet de type Stream a implementer
	
	public function __construct()
	{
		$this->Id=0;
		$this->Name="";
		$this->Type="";
		$this->Size=0;
		$this->Content="";
	}
	
	public function getId() 			{return $this->Id;}
	public function getName() 			{return $this->Name;}
	public function getType() 			{return $this->Type;}
	public function getSize()			{return $this->Size;}
	public function getContent()		{return $this->Content;}
	
	
	public function setId 		($Id) 		{ return ($this->Id=$Id); }
	public function setName 	($Name) 	{ return ($this->Name=$Name); }	
	public function setType 	($Type) 	{ return ($this->Type=$Type); }	
	public function setSize 	($Size) 	{ return ($this->Size=$Size); }
	public function setContent 	($Content) 	{ return ($this->Content=$Content); }
   
	public function getAttributes ()
	{
		$list = array ('Id' 		=> $this->Id, 
					   'Name' 		=> $this->Name, 
					   'Type' 	  	=> $this->Type,
					   'Size' 	  	=> $this->Size,  
				       'Content'    => $this->Content);
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
	
	public function init($Id, $Name, $Type, $Size, $Content)
  	{
  		$this->Id		=$Id;
  		$this->Name		=$Name;
  		$this->Type		=$Type;
  		$this->Size		=$Size;
  		$this->Content	=$Content;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id		=$array["Id"];
  		$this->Name		=$array["Name"];
  		$this->Type		=$array["Type"];
  		$this->Size		=$array["Size"];
  		$this->Content	=$array["Content"];
  	}
}
