<?php

class MoneyIn
{
	public $Id;
	public $OrderId;
	public $AccountId;
	public $Card;
	public $Amount;
	public $IsMine;
	public $OperationDate;
	public $Fee;
	
	
	public function __construct()
	{
		$this->Id=0;
		$this->OrderId="";
		$this->AccountId= new AccountRef();
		$this->Card=new CBCardRef();
		$this->Amount=0;
		$this->IsMine=false;
		$this->OperationDate= new DateTime($time, $object);
		$this->Fee= new Fee();
	}
	
	public function getId() 			{return $this->Id;}
	public function getOrderId() 		{return $this->OrderId;}
	public function getAccountId()		{return $this->AccountId;}
	public function getCard() 			{return $this->Card;}
	public function getAmount() 		{return $this->Amount;}
	public function getIsMine()			{return $this->IsMine;}
	public function getOperationDate()	{return $this->OperationDate;}
	public function getFee()			{return $this->Fee;}

	
	
	public function setId 				($Id) 				{ return ($this->Id=$Id); }
	public function setOrderId 			($OrderId) 			{ return ($this->OrderId=$OrderId); }
	public function setAccountId 		($AccountId) 		{ return ($this->AccountId=$AccountId); }
	public function setCard  			($Card)  			{ return ($this->Card=$Card); }
	public function setAmount 			($Amount) 			{ return ($this->Amount=$Amount); }
	public function setIsMine 			($IsMine) 			{ return ($this->IsMine=$IsMine); }
	public function setOperationDate 	($OperationDate)	{ return ($this->OperationDate=$OperationDate); }
	public function setFee 				($Fee) 				{ return ($this->Fee=$Fee); }
	
	public function getAttributes ()
  	{
		$list = array (	'Id' 				=> $this->Id, 
				   		'OrderId' 			=> $this->OrderId,
				   		'AccountId'			=> $this->AccountId->getAttributes(),
				   		'Card'     			=> $this->Card, 
				   		'Amount' 			=> $this->Amount,
				   		'IsMine' 			=> $this->IsMine,
				  		'OperationDate'  	=> $this->OperationDate,
				   		'Fee' 				=> $this->Fee ->getAttributes());
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
  	
  	
  	
  	public function init($Id, $OrderId,  $AccountId, $Card, $Amount, $IsMine, $OperationDate, $Fee )
  	{
  		$this->Id				=$Id;
  		$this->OrderId			=$OrderId;
  		$this->AccountId		=$AccountId;
  		$this->Card				=$Card;
		$this->Amount			=$Amount;
		$this->IsMine			=$IsMine;
		$this->OperationDate	=$OperationDate;
		$this->Fee				=$Fee;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id				=$array["Id"];
  		$this->OrderId			=$array["OrderId"];
  		$this->AccountId		=$array["AccountId"];
  		$this->Card				=$array["Card"];
		$this->Amount			=$array["Amount"];
		$this->IsMine			=$array["IsMine"];
		$this->OperationDate	=$array["OperationDate"];
		$this->Fee				=$array["Fee"];
  	}
}