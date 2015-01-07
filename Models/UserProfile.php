<?php

class UserProfile
{
	public $Civility;
	public $FirstName;
	public $LastName;
	public $Birthdate;
	public $Address;
	public $PhoneNumber;
	public $Email;
	public $Alias;
	public $Photo;
	
	public function __construct()
	{
		$this->Civility    = Civility::$civility["Empty"];
		$this->FirstName   = "";
		$this->LastName    = "";
	/*	$this->Birthdate   = date(DateTime::ATOM, '1879-03-14 00:00:00');*/
		$this->Birthdate   = null;
		$this->Address     = new Address();
		$this->PhoneNumber = "";
		$this->Email       = "";
		$this->Alias       = "";
		$this->Photo       =  new PhotoRef();
	}
	
	public function getCivility() 		{return $this->Civility;}
	public function getFirstName() 		{return $this->FirstName;}
	public function getLastName()		{return $this->LastName;}
	public function getBirthdate() 		{return $this->Birthdate;}
	public function getAddress()		{return $this->Address;}
	public function getPhoneNumber()	{return $this->PhoneNumber;}
	public function getEmail() 			{return $this->Email;}
	public function getAlias() 			{return $this->Alias;}
	public function getPhoto() 			{return $this->Photo;}
	
	
	public function setCivility 		($Civility) 		{ return ($this->Civility=$Civility); }
	public function setFirstName 		($FirstName) 		{ return ($this->FirstName=$FirstName); }
	public function setLastName 		($LastName) 		{ return ($this->LastName=$LastName); }
	public function setBirthdate 		($Birthdate) 		{ return ($this->Birthdate=$Birthdate); }
	public function setAddress 			($Address) 			{ return ($this->Address=$Address); }
	public function setPhoneNumber 		($PhoneNumber) 		{ return ($this->PhoneNumber=$PhoneNumber); }
	public function setEmail 			($Email) 			{ return ($this->Email=$Email); }
	public function setAlias 			($Alias) 			{ return ($this->Alias=$Alias); }
	public function setPhoto			($Photo)			{ return ($this->Photo=$Photo); }
   
	public function getAttributes ()
    {
		$list = array (	'Civility' 			=> $this->Civility, 
				   		'FirstName' 	  	=> $this->FirstName, 
				   		'LastName' 	  		=> $this->LastName, 
				   		'Birthdate' 		=> $this->Birthdate,
				   		'Address' 			=> $this->Address,
				   		'PhoneNumber' 		=> $this->PhoneNumber,
				   		'Email' 			=> $this->Email,
				   		'Alias' 	  		=> $this->Alias,  
				   		'Photo'    			=> $this->Photo);
		return $list;
	}
  	
  	public function encodeJSON()
  	{
  	    $json = new StdClass();
  		foreach ($this as $key => $value){

  			$lowerKey = strtolower($key);
  			if (is_object($this->$key) && method_exists($this->$key, 'encodeJson')) {
  				$value = json_decode($this->$key->encodeJson());
  			} 
  			if (is_int($value)) {
  				$json->$lowerKey = $value;
  			}else if (!empty($value)) {
  				$json->$lowerKey = $value;
  			}
  		}

  		return json_encode($json);
  	}
	
	public function init($Civility, $FirstName, $LastName, $Birthdate, $Address, $PhoneNumber, $Email, $Alias, $Photo)
	{
		$this->Civility    = $Civility;
		$this->FirstName   = $FirstName;
		$this->LastName    = $LastName;
		$this->Birthdate   = $Birthdate;
		$this->Address     = $Address;
		$this->PhoneNumber = $PhoneNumber;
		$this->Email       = $Email;
		$this->Alias       = $Alias;
		$this->Photo       = $Photo;
	}
	
	
	public function initObject($array)
	{
		$this->Civility  = $array["Civility"];
		$this->FirstName = $array["FirstName"];
		$this->LastName  = $array["LastName"];
		if (isset($array["Birthdate"]) && !is_null($array["Birthdate"])) {
			$this->Birthdate = date(DateTime::ATOM, strtotime($array["Birthdate"]));
		}
		
		/****/
		$address = new Address();
		$address->initObject($array["Address"]);
		$this->Address = $address;
		
		
		$this->PhoneNumber = $array["PhoneNumber"];
		$this->Email       = $array["Email"];
		$this->Alias       = $array["Alias"];
		
		/****/
		$photo = new PhotoRef();
		$photo->initObject($array["Photo"]);
		
		$this->Photo = $photo;
	}

  
}