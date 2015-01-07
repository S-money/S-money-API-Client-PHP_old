<?php

class CBCardRef
{
	public $Id;
	public $AppCardID;
	public $Href;

	public function __construct()
	{
		$this->Id="";
		$this->AppCardID="";
		$this->Href="";
	}
	
	public function getId() 			{return $this->Id;}
	public function getAppCardID() 		{return $this->AppAppCardID;}
	public function getHref() 			{return $this->Href;}


	public function setId 			($Id) 			{ return ($this->Id=$Id); }
	public function setAppCardID 	($AppCardID) 	{ return ($this->AppCardID=$AppCardID); }
	public function setHref			($Href)			{ return ($this->Href=$Href); }	

  public function getAttributes ()
  {
  	$list = array ('Id' 		  => $this->Id,
  				   'AppCardID' 	  => $this->AppCardID,  
  				   'Href'    	  => $this->Href);
  	return $list;
  }

  public function encodeJSON()
  {
    foreach ($this as $key => $value){
      $lowerKey = strtolower($key);
      $json->$lowerKey = $value;
    }
    return json_encode($json);
  }
   
   
  public function init($Id, $AppCardId, $Href)
  {
  	$this->Id=$Id;
  	$this->AppCardId=$AppCardId;
  	$this->Href=$Href;

  }
   
   
  public function initObject($array)
  {
  	$this->Id=$array["Id"];
  	$this->AppCardId=$array["AppCardId"];
  	$this->Href=$array["Href"];
  }
  	
}