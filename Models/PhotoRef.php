<?php

class PhotoRef
{
	public $Href;

	public function __construct()
	{
		$this->Href="";
	}
	
	public function getHref() 			{return $this->Href;}

	public function setHref			($Href)			{ return ($this->Href=$Href); }	
  
	public function getAttributes ()
  	{
		$list = array ('Href'    => $this->Href);
		return $list;
  	}
  	
    public function encodeJSON()
    {
      $json = new StdClass();
      foreach ($this as $key => $value){

        $lowerKey = strtolower($key);
        if (is_object($this->$key)) {
          $value = json_decode($this->$key->encodeJson());
        } 

        if (!empty($value)) { 
          $json->$lowerKey = $value;
        }
      }

      return json_encode($json);
    }
    
  
  	public function init($Href)
  	{
  		$this->Href=$Href;
  	}
  	
  	
  	public function initObject($array)
  	{
  		$this->Href=$array["Href"];
  	}
}
