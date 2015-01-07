<?php

class AccountOpeningInvitation
{
	public $Id;
	public $UserProfile;
	public $CallbackUrl;
	public $Date;
	
	public function __construct()
	{
		$this->Id="";
		$this->UserProfile= new UserProfile();
		$this->CallbackUrl="";
		$this->Date= new DateTime($time, $object);
	}
	
	public function getId() 			{return $this->Id;}
	public function getUserProfile() 	{return $this->UserProfile;}
	public function getCallbackUrl()	{return $this->CallbackUrl;}
	public function getDate()			{return $this->Date;}
	
	
	public function setId 			($Id) 			{ return ($this->Id=$Id); }
	public function setUserProfile  ($UserProfile)  { return ($this->UserProfile=$UserProfile); }
	public function setCallbackUrl 	($CallbackUrl) 	{ return ($this->CallbackUrl=$CallbackUrl); }
	public function setDate 		($Date) 		{ return ($this->Date=$Date); }
   
	public function getAttributes()
  	{
		$list = array (	'Id' 		 	=> $this->Id, 
				   		'UserProfile'  	=> $this->UserProfile, 
				   		'CallbackUrl'  	=> $this->CallbackUrl, 
				   		'Date'   	  	=> $this->Date);
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
  	 
  	 
  	public function init($Id, $AppAccountId, $DisplayName, $Href)
  	{
  		$this->Id=$Id;
  		$this->AppAccountID=$AppAccountId;
  		$this->DisplayName=$DisplayName;
  		$this->Href=$Href;
  	}
  	 
  	 
  	 
  	public function initObject($array)
  	{
  		$this->Id=$array["Id"];
  		$this->AppAccountID=$array["AppAccountID"];
  		$this->DisplayName=$array["DisplayName"];
  		$this->Href=$array["Href"];
  	}
}