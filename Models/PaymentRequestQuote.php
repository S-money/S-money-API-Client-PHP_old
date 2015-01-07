<?php

 class PaymentRequestQuote
 {
    public $Receiver;
    public $Requester; 
    public $Amount; 
    public $Fee;
    public $Message;
    public $Visible; 
		
	public function __construct()
	{
		$this->Receiver=new AccountRef();
		$this->Requester=new AccountRef();
		$this->Amount=0;
		$this->Fee=new Fee();
		$this->Message="";
		$this->Visible=false;
	}
	
	public function getReceiver()	{return $this->Receiver;}
	public function getRequester()	{return $this->Requester;}
	public function getAmount()		{return $this->Amount;}
	public function getFee() 		{return $this->Fee;}
	public function getMessage()	{return $this->Message;}
	public function getVisible() 	{return $this->Visible;}
	
	public function setReceiver 	($Receiver) 	{ return ($this->Amount=$Receiver); }
	public function setRequester 	($Requester) 	{ return ($this->Requester=$Requester); }
	public function setAmount 		($Amount) 		{ return ($this->Amount=$Amount); }
	public function setFee 			($Fee) 			{ return ($this->Fee=$Fee); }
	public function setMessage 		($Message) 		{ return ($this->Message=$Message); }
	public function setVisible 		($Visible) 		{ return ($this->Visible=$Visible); }
   
	public function getAttributes ()
	{
		$list = array ('Receiver' 		=> $this->Receiver,
					   'Requester' 		=> $this->Requester,
					   'Amount' 		=> $this->Amount,
					   'Fee' 			=> $this->Fee,					   
				       'Message' 		=> $this->Message,
					   'Visible' 		=> $this->Visible);
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
  	
  	
  	
  	public function init($Receiver, $Requester, $Amount, $Fee, $Message, $Visible )
  	{
  		$this->Receiver		=$Receiver;
  		$this->Requester	=$Requester;
  		$this->Amount		=$Amount;
  		$this->Fee			=$Fee;
  		$this->Message		=$Message;
		$this->Visible		=$Visible;
	}
  	
  	public function initObject($array)
  	{
  		$this->Receiver		=$array["Receiver"];
  		$this->Requester	=$array["Requester"];
  		$this->Amount		=$array["Amount"];
  		$this->Fee			=$array["Fee"];
  		$this->Message		=$array["Message"];
		$this->Visible		=$array["Visible"];
  	}
 }
	