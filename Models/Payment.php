<?php

class Payment
{
	public $Id;
	public $PaymentDate;
	public $Amount;
	public $Fee;
	public $Beneficiary;
	public $Sender;
	public $Message;
	
	public function __construct()
	{
		$this->Id			=0;
		$this->PaymentDate	=date(DateTime::ATOM);
		$this->Amount		=0;
		$this->Fee			=new Fee();
		$this->Beneficiary	=new AccountRef();
		$this->Sender		=new AccountRef();
		$this->Message		="";
	
	}
	
	public function getId()			{return $this->Id;}
	public function getPaymentDate(){return $this->PaymentDate;}
	public function getAmount()		{return $this->Amount;}
	public function getFee() 		{return $this->Fee;}
	public function getBeneficiary(){return $this->Beneficiary;}
	public function getSender() 	{return $this->Sender;}
	public function getMessage()	{return $this->Message;}
	
	public function setId 			($Id) 			{ return ($this->Amount=$Id); }
	public function setPaymentDate 	($PaymentDate) 	{ return ($this->PaymentDate=$PaymentDate); }
	public function setAmount 		($Amount) 		{ return ($this->Amount=$Amount); }
	public function setFee 			($Fee) 			{ return ($this->Fee=$Fee); }
	public function setBeneficiary 	($Beneficiary) 	{ return ($this->Beneficiary=$Beneficiary); }
	public function setSender 		($Sender) 		{ return ($this->Sender=$Sender); }
	public function setMessage 		($Message) 		{ return ($this->Message=$Message); }
	
	public function getAttributes ()
	{
		$list = array (	'Id' 			=> $this->Id,
						'PaymentDate' 	=> $this->PaymentDate,
						'Amount' 		=> $this->Amount,
						'Fee' 			=> $this->Fee,
						'Beneficiary' 	=> $this->Beneficiary,
						'Sender' 		=> $this->Sender,
						'Message' 		=> $this->Message);
		return $list;
	}
	
  	public function encodeJSON()
  	{
  	    $json = new StdClass();
  		foreach ($this as $key => $value){
  			if (!is_null($value)) {
	  			$lowerKey = strtolower($key);
	  			$json->$lowerKey = $value;
  			}
  		}
  		return json_encode($json);
  	}

	public function init($Amount, $PaymentDate, $Fee, $Beneficiary, $Sender, $Message = '')
	{
		$this->PaymentDate	=$PaymentDate;
		$this->Amount		=$Amount;
		$this->Fee			=$Fee;
		$this->Beneficiary	=$Beneficiary;
		$this->Sender		=$Sender;
		$this->Message		=$Message;
	}

	public function initObject($array)
	{
		$this->Id			=$array["Id"];
		
		// $this->PaymentDate	=date(DateTime::ATOM, $array["PaymentDate"]);
		$this->PaymentDate	=$array["PaymentDate"];
		
		$this->Amount		=$array["Amount"];
		
		/*********/
		$fee = new Fee();
		$fee->initObject($array["Fee"]);
		$this->Fee	=$fee;

		/*********/
		$accountRef = new AccountRef();
		$accountRef->initObject($array["Beneficiary"]);
		$this->Beneficiary 		=$accountRef;
		
		/*********/
		$accountRefs = new AccountRef();
		$accountRefs->initObject($array["Sender"]);
		$this->Sender 		=$accountRefs;
	
		$this->Message		=$array["Message"];
	}
}