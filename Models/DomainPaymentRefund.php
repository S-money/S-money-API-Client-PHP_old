<?php

class DomainPaymentRefund
{
	public $Amount;
	public $OrderId;
	public $Message;
	public $IsAuto;
	
	public function __construct()
	{
		$this->Amount=0;
		$this->OrderId="";
		$this->Message="";
		$this->IsAuto=false;
	}
	
	public function getAmount() 			{return $this->Amount;}
	public function getOrderId() 			{return $this->OrderId;}
	public function getMessage()			{return $this->Message;}
	public function getIsAuto()				{return $this->IsAuto;}

	public function setAmount 	($Amount) 			{ return ($this->Amount=$Amount); }
	public function setOrderId 	($OrderId) 			{ return ($this->OrderId=$OrderId); }
	public function setMessage 	($Message) 			{ return ($this->Message=$Message); }
	public function setIsAuto 	($IsAuto) 			{ return ($this->IsAuto=$IsAuto); }
	
	public function getAttributes ()
  {
	$list = array ('Amount' 	=> $this->Amount,
				   'OrderId' 	=> $this->OrderId,
				   'Message' 	=> $this->Message,
				   'IsAuto' 	=> $this->IsAuto);
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
  	
  	
  	public function init($Amount, $OrderId, $Message, $IsAuto )
  	{
  		$this->Amount		=$Amount;
  		$this->OrderId		=$OrderId;
  		$this->Message		=$Message;
  		$this->IsAuto		=$IsAuto;

  	}
  	
  	public function initObject($array)
  	{
  		$this->Amount		=$array["Amount"];
  		$this->OrderId		=$array["OrderId"];
  		$this->Message		=$array["Message"];
  		$this->IsAuto		=$array["IsAuto"];
  
  	}
}
