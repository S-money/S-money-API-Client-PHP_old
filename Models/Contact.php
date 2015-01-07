<?php

class Contact
{
	public $User;
	public $IsBookmarked;
	public $IsBlocked;
	public $IsSmoneyUser;
	public $IsSmoneyPro;
	
	public function __construct()
	{
		$this->User="";
		$this->IsBookmarked=false;
		$this->IsBlocked=false;
		$this->IsSmoneyUser=false;
		$this->IsSmoneyPro=false;
	}
	
	public function getUser() 			{return $this->User;}
	public function getIsBookmarked() 	{return $this->IsBookmarked;}
	public function getIsBlocked()		{return $this->IsBlocked;}
	public function getIsSmoneyUser() 	{return $this->IsSmoneyUser;}
	public function getIsSmoneyPro()	{return $this->IsSmoneyPro;}
	
	
	public function setUser 			($User) 		{ return ($this->User=$User); }
	public function setIsBookmarked 	($IsBookmarked) { return ($this->IsBookmarked=$IsBookmarked); }
	public function setIsBlocked 		($IsBlocked) 	{ return ($this->IsBlocked=$IsBlocked); }
	public function setIsSmoneyUser 	($IsSmoneyUser) { return ($this->IsSmoneyUser=$IsSmoneyUser); }
	public function setIsSmoneyPro 		($IsSmoneyPro) 	{ return ($this->IsSmoneyPro=$IsSmoneyPro); }
   
	public function getAttributes ()
  {
	$list = array ('User' 		  => $this->User, 
				   'IsBookmarked' => $this->IsBookmarked, 
				   'IsBlocked' 	  => $this->IsBlocked, 
				   'IsSmoneyUser' => $this->IsSmoneyUser,
				   'IsSmoneyPro'  => $this->IsSmoneyPro);
	return $list;
  }
}