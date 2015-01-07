<?php


class Address
{
	public $Street;
	public $ZipCode;
	public $City;
	public $Country;
	
	public function __construct()
	{
		$this->Country = Country::$country["France"];
	}
	
	public function getStreet() 	{return $this->Street;}
	public function getZipCode() 	{return $this->ZipCode;}
	public function getCity()		{return $this->City;}
	public function getCountry()	{return $this->Country;}
	
	
	public function setStreet  ($Street)  { return ($this->Street=$Street); }
	public function setZipCode ($ZipCode) { return ($this->ZipCode=$ZipCode); }
	public function setCity    ($City) 	  { return ($this->City=$City); }
	public function setCountry ($Country) { return ($this->Country=$Country); }
   
	public function getAttributes ()
  	{
		$list = array (	'Street'  	=> $this->Street, 
				   		'ZipCode' 	=> $this->ZipCode, 
				   		'City'  	=> $this->City, 
				   		'Country' 	=> $this->Country);
		return $list;
  	}
  	
 
    public function encodeJSON()
    {

      $json = new StdClass();
      foreach ($this as $key => $value){
        $lowerKey = strtolower($key);
        if (!empty($value)) {
          $json->$lowerKey = $value;
        }
      }
      return json_encode($json);
    }
  	 
  	 
  	public function init($Street, $ZipCode, $City, $Country)
  	{
  		$this->Street=$Street;
  		$this->ZipCode=$ZipCode;
  		$this->City=$City;
  		$this->Country=$Country;
  	}
  	 
  	 
  	public function initObject($array)
  	{
  		$this->Street		=$array["Street"];
  		$this->ZipCode		=$array["ZipCode"];
  		$this->City			=$array["City"];
  		$this->Country		=$array["Country"];
  	}
}