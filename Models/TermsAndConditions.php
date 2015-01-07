<?php


class TermsAndConditions
{
	public $areAccepted;
	public $LastAcceptanceDate;
	public $UpdateDate;
	public $Url;
	
	public function __construct()
	{
		$this->areAccepted=true;
		$this->LastAcceptanceDate	= new DateTime($time, $object);
		$this->UpdateDate			= new DateTime($time, $object);
		$this->Url="";
	}
	
	public function getAreAccepted() 		{return $this->AreAccepted;}
	public function getLastAcceptanceDate() {return $this->LastAcceptanceDate;}
	public function getUpdateDate()			{return $this->UpdateDate;}
	public function getUrl()				{return $this->Url;}
	
	
	public function setAreAccepted  		($AreAccepted)  		{ return ($this->AreAccepted=$AreAccepted); }
	public function setLastAcceptanceDate 	($LastAcceptanceDate) 	{ return ($this->LastAcceptanceDate=$LastAcceptanceDate); }
	public function setUpdateDate    		($UpdateDate) 	  		{ return ($this->City=$UpdateDate); }
	public function setUrl 					($Url) 					{ return ($this->Url=$Url); }
   
	public function getAttributes ()
  	{
		$list = array (	'AreAccepted' 			=> $this->AreAccepted, 
				   		'LastAcceptanceDate' 	=> $this->LastAcceptanceDate, 
				   		'UpdateDate'  			=> $this->UpdateDate, 
				   		'Url' 					=> $this->Url);
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
  	
  	
  	public function init($AreAccepted, $LastAcceptanceDate, $UpdateDate, $Url)
  	{
  		$this->AreAccepted=$AreAccepted;
  		$this->LastAcceptanceDate=$LastAcceptanceDate;
  		$this->UpdateDate=$UpdateDate;
  		$this->Url=$Url;
  	}
  	
  	public function initObject($array)
  	{
  		$this->AreAccepted			= $array["AreAccepted"];
  		$this->LastAcceptanceDate	= new DateTime($array["LastAcceptanceDate"]);
  		$this->UpdateDate			= new DateTime($array["UpdateDate"]);
  		$this->Url					= $array["Url"];
  	}
  
}