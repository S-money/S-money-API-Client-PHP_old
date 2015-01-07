<?php

class DomainPayment
{
	public $Id;
	public $OrderId;
	public $Amount;
	public $Fee;
	public $Beneficiary;
	public $Message;
	public $PaymentDate;
	public $DomainUserId;
	public $DomainName;
	public $DomainClientName;
	public $Beneficiary;
	public $DomainUserName;
	
	
	public function __construct()
	{
		$this->Id=0;
		$this->OrderId="";
		$this->Amount=0;
		$this->Fee= new Fee();
		$this->Beneficiary= new MoneyOperationStatus();
		$this->Message="";
		$this->PaymentDate= new DateTime($time, $object);
		$this->DomainUserId="";
		$this->DomainName="";
		$this->DomainClientName="";
		$this->Beneficiary=new AccountRef();
		$this->DomainName="";
	}
	
	public function getId() 				{return $this->Id;}
	public function getOrderId() 			{return $this->OrderId;}
	public function getAmount() 			{return $this->Amount;}
	public function getMessage()			{return $this->Message;}
	public function getPaymentDate()		{return $this->PaymentDate;}
	public function getDomainUserId() 		{return $this->DomainUserId;}
	public function getDomainName() 		{return $this->DomainName;}
	public function getDomainClientName()	{return $this->DomainClientName;}
	public function getBeneficiary()		{return $this->Beneficiary;}
	public function getDomainUserName()		{return $this->DomainUserName;}

	
	
	public function setId 				($Id) 				{ return ($this->Id=$Id); }
	public function setOrderId 			($OrderId) 			{ return ($this->OrderId=$OrderId); }
	public function setAmount 			($Amount) 			{ return ($this->Amount=$Amount); }
	public function setMessage 			($Message) 			{ return ($this->Message=$Message); }
	public function setPaymentDate 		($PaymentDate) 		{ return ($this->PaymentDate=$PaymentDate); }
	public function setDomainUserId  	($DomainUserId)  	{ return ($this->DomainUserId=$DomainUserId); }
	public function setDomainName 		($DomainName) 		{ return ($this->DomainName=$DomainName); }
	public function setDomainClientName ($DomainClientName)	{ return ($this->DomainClientName=$DomainClientName); }
	public function setBeneficiary 		($Beneficiary) 		{ return ($this->Beneficiary=$Beneficiary); }
	public function setDomainUserName 	($DomainUserName) 	{ return ($this->DomainUserName=$DomainUserName); }
	
	public function getAttributes ()
  {
	$list = array ('Id' 				=> $this->Id, 
				   'OrderId' 			=> $this->OrderId,
				   'Amount' 			=> $this->Amount,
				   'Message' 			=> $this->Message,
				   'PaymentDate'		=> $this->PaymentDate,
				   'DomainUserId'     	=> $this->DomainUserId, 
				   'DomainName' 		=> $this->DomainName, 
				   'DomainClientName'  	=> $this->DomainClientName,
				   'Beneficiary'		=> $this->Beneficiary,
				   'DomainUserName' 	=> $this->DomainUserName);
	return $list;
  }
  
  public function encodeJSON()
  	{
  		foreach ($this as $key => $value)
  			$json->$key = $value;
  		return json_encode($json);
  	}
  	
  	
  	public function init($Id, $OrderId, $Amount, $Message, $PaymentDate, $DomainUserId, $DomainName, $DomainClientName, $Beneficiary, $DomainUserName)
  	{
  		$this->Id				=$Id;
  		$this->OrderId			=$OrderId;
  		$this->Amount			=$Amount;
  		$this->Message			=$Message;
  		$this->PaymentDate		=$PaymentDate;
		$this->DomainUserId		=$DomainUserId;
		$this->DomainName		=$DomainName;
		$this->DomainClientName	=$DomainClientName;
		$this->Beneficiary		=$Beneficiary;
		$this->DomainUserName	=$DomainUserName;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id				=$array["Id"];
  		$this->OrderId			=$array["OrderId"];
  		$this->Amount			=$array["Amount"];
  		$this->Message			=$array["Message"];
  		$this->PaymentDate		=$array["PaymentDate"];
		$this->DomainUserId		=$array["DomainUserId"];
		$this->DomainName		=$array["DomainName"];
		$this->DomainClientName	=$array["DomainClientName"];
		$this->Beneficiary		=$array["Beneficiary"];
		$this->DomainUserName	=$array["DomainUserName"];
  	}
}