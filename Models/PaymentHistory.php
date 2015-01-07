<?php

class PaymentHistory extends HistoryItem
{
	public $Sender;
	public $Beneficiary;
	public $ChatMessages = array();
	public $PaymentRequest =  null;
	
	public function __construct()
	{
		parent::__construct();
		$this->Sender			=new AccountRef();
		$this->Beneficiary		=new Account();
	}
	
	public function getSender() 				{return $this->Sender;}
	public function getBeneficiary() 			{return $this->Beneficiary;}
	public function getChatMessages() 			{return $this->ChatMessages;}
	public function getPaymentRequest()			{return $this->PaymentRequest;}
	
	
	public function setSender 		  ($Sender) 		{ return ($this->Sender=$Sender); }
	public function setBeneficiary 	  ($Beneficiary) 	{ return ($this->Beneficiary=$Beneficiary); }	
	public function setChatMessages   ($ChatMessages) 	{ return ($this->ChatMessages=$ChatMessages); }	
	public function setPaymentRequest ($PaymentRequest) { return ($this->PaymentRequest=$PaymentRequest); }
   
	public function getAttributes ()
	{
		$list = array ('Sender' 		=> $this->Sender->getAttributes(), 
					   'Beneficiary' 	=> $this->Beneficiary->getAttributes(), 
					   'ChatMessages' 	=> $this->ChatMessages,
					   'PaymentRequest'	=> $this->PaymentRequest->getAttributes());
		return array_merge($parent::getAttributes() , $list);
	}
	

  	public function initObject($array)
  	{
  		parent::initObject($array);
  		$this->Sender			=$array["Sender"];
  		$this->Beneficiary		=$array["Beneficiary"];
  		$this->ChatMessages		=$array["ChatMessages"];
  		$this->PaymentRequest	=$array["PaymentRequest"];
  	}
  	
}
