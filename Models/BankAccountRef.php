<?php

class BankAccountRef
{
	public $Id;
	public $Href;

	public function __construct()
	{
		$this->Id="";
		$this->Href="";
	}
	
	public function getId() 			{return $this->Id;}
	public function getHref() 			{return $this->Href;}


	public function setId 			($Id) 			{ return ($this->Id=$Id); }
	public function setHref			($Href)			{ return ($this->Href=$Href); }	
  
	public function getAttributes ()
  	{
		$list = array ('Id' 		  => $this->Id,  
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
  	
  	public function init($Id, $Href)
  	{
  		$this->Id=$Id;
  		$this->Href=$Href;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id			=$array["Id"];
  		$this->Href			=$array["Href"];
  	}
}