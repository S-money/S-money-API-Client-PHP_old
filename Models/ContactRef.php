<?php

class ContactRef
{
	public $AccountId;
	public $IsSmoneyUser;
	public $IsSmoneyPro;
	public $Href;

	public function __construct()
	{
		$this->AccountId="";
		$this->IsSmoneyUser=false;
		$this->IsSmoneyPro=false;
		$this->Href="";
	}
	
	public function getAccountId() 		{return $this->AccountId;}
	public function getIsSmoneyUser() 	{return $this->IsSmoneyUser;}
	public function getIsSmoneyPro()	{return $this->IsSmoneyPro;}
	public function getHref() 			{return $this->Href;}


	public function setAccountId	($AccountId) 	{ return ($this->AccountId=$AccountId); }
	public function setIsBookmarked ($IsBookmarked) { return ($this->IsBookmarked=$IsBookmarked); }
	public function setIsBlocked 	($IsBlocked) 	{ return ($this->IsBlocked=$IsBlocked); }
	public function setHref			($Href)			{ return ($this->Href=$Href); }	
  
	public function getHref ()
  {
	$list = array ('AccountId' 		  => $this->AccountId,
				   'IsSmoneyUser' => $this->IsSmoneyUser,
				   'IsSmoneyPro'  => $this->IsSmoneyPro,  
				   'Href'    	  => $this->Href);
	return $list;
  }
}