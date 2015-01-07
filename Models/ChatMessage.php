<?php

class ChatMessage
{
	public $Message;
	public $Sender;
	public $Date;
	
	public function __construct()
	{
		$this->Message	="";
		$this->Sender	= new AccountRef();
		$this->Date		="";
	}
	
	public function getMessage() 		{return $this->Message;}
	public function getSender() 		{return $this->Sender;}
	public function getDate()			{return $this->Date;}
	
	
	public function setMessage 	($Message) 	{ return ($this->Message=$Message); }	
	public function setSender 	($Sender) 	{ return ($this->Sender=$Sender); }	
	public function setDate 	($Date) 	{ return ($this->Date=$Date); }
   
	public function getAttributes ()
	{
		$list = array ('Message' 		=> $this->Message, 
				       'Sender' 	  	=> $this->Sender,
				       'Date' 	  		=> $this->Date);
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
  	
  	
  	public function init($Message, $Sender, $Date)
  	{
  		$this->Message	=$Message;
  		$this->Sender	=$Sender;
  		$this->Date		=$Date;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Message	=$array["Message"];
  		$this->Sender	=$array["Sender"];
  		$this->Date		=$array["Date"];

  	}
  	
}

