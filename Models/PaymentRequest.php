<?php

 class PaymentRequest
 {
	public $Id;
    public $Receiver;
    public $Requester; 
    public $Amount; 
    public $Fee;
    public $Message;
	public $Status;
	public $RequestDate;
	public $ResponseDate;
	public $ResponseMessage;
    public $Visible; 
		
	public function __construct()
	{
		$this->Id=0;
		$this->Receiver=new AccountRef();
		$this->Requester=new AccountRef();
		$this->Amount=0;
		$this->Fee=new Fee();
		$this->Message="";
		$this->Status= new PayRequestStatus();
		$this->RequestDate= new DateTime($time, $object);
		$this->ResponseDate= new DateTime($time, $object);
		$this->ResponseMessage="";
		$this->Visible=false;
	}
	
	public function getId()					{return $this->Id;}
	public function getReceiver()			{return $this->Receiver;}
	public function getRequester()			{return $this->Requester;}
	public function getAmount()				{return $this->Amount;}
	public function getFee() 				{return $this->Fee;}
	public function getMessage()			{return $this->Message;}
	public function getStatus() 			{return $this->Status;}
	public function getRequestDate()		{return $this->RequestDate;}
	public function getResponseDate()		{return $this->ResponseDate;}
	public function getResponseMessage()	{return $this->ResponseMessage;}
	public function getVisible() 			{return $this->Visible;}
	
	public function setId 				($Id) 					{ return ($this->Amount=$Id); }
	public function setReceiver 		($Receiver) 			{ return ($this->Amount=$Receiver); }
	public function setRequester 		($Requester) 			{ return ($this->Requester=$Requester); }
	public function setAmount 			($Amount) 				{ return ($this->Amount=$Amount); }
	public function setFee 				($Fee) 					{ return ($this->Fee=$Fee); }
	public function setMessage 			($Message) 				{ return ($this->Message=$Message); }
	public function setStatus  			($Status)  				{ return ($this->Status=$Status); }
	public function setRequestDate 		($RequestDate) 			{ return ($this->RequestDate=$RequestDate); }
	public function setResponseDate    	($ResponseDate) 	  	{ return ($this->ResponseDate=$ResponseDate); }
	public function setResponseMessage 	($ResponseMessage) 		{ return ($this->ResponseMessage=$ResponseMessage); }
	public function setVisible 			($Visible) 				{ return ($this->Visible=$Visible); }
   
	public function getAttributes ()
	{
		$list = array ('Id' 				=> $this->Id,
					   'Receiver' 			=> $this->Receiver,
					   'Requester' 			=> $this->Requester,
					   'Amount' 			=> $this->Amount,
					   'Fee' 				=> $this->Fee,					   
				       'Message' 			=> $this->Message,
					   'Status'  			=> $this->Status, 
					   'RequestDate' 		=> $this->RequestDate, 
					   'ResponseDate'  		=> $this->ResponseDate, 
					   'ResponseMessage' 	=> $this->ResponseMessage,
					   'Visible' 			=> $this->Visible ) ;
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
  	
  	
  	
  	public function init($Id, $Receiver, $Requester, $Amount, $Fee, $Message, $Status, $RequesDate, $ResponseDate, $ResponseMessage, $Visible)
  	{
  		$this->Id				=$Id;
  		$this->Receiver			=$Receiver;
  		$this->Requester		=$Requester;
  		$this->Amount			=$Amount;
  		$this->Fee				=$Fee;
		$this->Message			=$Message;
		$this->Status			=$Status;
		$this->RequestDate		=$RequestDate;
		$this->ResponseDate		=$ResponseDate;
		$this->ResponseMessage	=$ResponseMessage;
		$this->Visible			=$Visible;
		
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id				=$array["Id"];
  		$this->Receiver			=$array["Receiver"];
  		$this->Requester		=$array["Requester"];
  		$this->Amount			=$array["Amount"];
  		$this->Fee				=$array["Fee"];
		$this->Message			=$array["Message"];
		$this->Status			=$array["Status"];
		$this->RequestDate		=$array["RequestDate"];
		$this->ResponseDate		=$array["ResponseDate"];
		$this->ResponseMessage	=$array["ResponseMessage"];
		$this->Visible			=$array["Visible"];
  	}
 }
	