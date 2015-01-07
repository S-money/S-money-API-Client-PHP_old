<?php

class CardRegistration
{
	public $Card;
	public $Status;
	public $UrlReturn;
	public $AvailableCards;
	public $ErrorCode;
	public $ExtraResults;
	public $Href;
	
	public function __construct()
	{
		$this->Card= new Card();
		$this->Status=0;
		$this->UrlReturn="";
		$this->AvailableCards="";
		$this->ErrorCode=0;
		$this->ExtraResults= new SPExtraResultCodes();
		$this->Href="";
	}
	
	public function getCard() 			{return $this->Card;}
	public function getStatus() 		{return $this->Status;}
	public function getUrlReturn()		{return $this->UrlReturn;}
	public function getAvailableCards() {return $this->AvailableCards;}
	public function getErrorCode()		{return $this->ErrorCode;}
	public function getExtraResults()	{return $this->ExtraResults;}
	public function getHref()			{return $this->Href;}
	
	
	public function setCard 			($Card) 			{ return ($this->Card=$Card); }
	public function setStatus 			($Status) 			{ return ($this->Status=$Status); }
	public function setUrlReturn 		($NetWork) 			{ return ($this->UrlReturn=$UrlReturn); }
	public function setAvailableCards 	($AvailableCards) 	{ return ($this->AvailableCards=$AvailableCards); }
	public function setErrorCode 		($ErrorCode) 		{ return ($this->ErrorCode=$ErrorCode); }
	public function setExtraResults 	($ExtraResults) 	{ return ($this->ExtraResults=$ExtraResults); }
	public function setHref 			($Href) 			{ return ($this->_Name=$Href); }
   
	public function getAttributes ()
	{
		$list = array (	'Card' 		  	=> $this->Card, 
						'Status' 	  	=> $this->Status, 
						'UrlReturn' 	=> $this->UrlReturn, 
						'AvailableCards'=> $this->AvailableCards,
						'ErrorCode' 	=> $this->ErrorCode,
						'ExtraResults' 	=> $this->ExtraResults,
						'Href'      	=> $this->Href);
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
	
	
	public function init($Card, $Status, $UrlReturn, $AvailableCards, $ErrorCode)
	{
		$this->Card=$Card;
		$this->Status=$Status;
		$this->UrlReturn=$UrlReturn;
		$this->AvailableCards=$AvailableCards;
		$this->ErrorCode=$ErrorCode;
		$this->AvailableCards=$AvailableCards;
		$this->ErrorCode=$ErrorCode;
	}
	
	
	public function initObject($array)
	{
		$this->Card=$array["Card"];
		$this->Status=$array["Status"];
		$this->UrlReturn=$array["UrlReturn"];
		$this->AvailableCards=$array["AvailableCards"];
		$this->ErrorCode=$array["ErrorCode"];
		$this->ExtraResults=$array["ExtraResults"];
		$this->Href=$array["Href"];
	}
	
	
}

