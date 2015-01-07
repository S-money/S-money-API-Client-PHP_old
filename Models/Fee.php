<?php

class Fee
{
	public $Amount;
	public $VAT;
	public $AmountWithVAT;
	public $status;
	
	public function __construct()
	{
		$this->Amount=null;
		$this->VAT=null;
		$this->status=  0;
	}
	
	public function getAmount() 		{return $this->Amount;}
	public function getVAT() 			{return $this->VAT;}
	public function getAmountWithVAT()	{return $this->AmountWithVAT;}
	public function getstatus()			{return $this->status;}

	public function setAmount 			($Amount) 		{ return ($this->Amount=$Amount); }
	public function setVAT 				($VAT) 			{ return ($this->VAT=$VAT); }
	public function setAmountWithVAT 	($AmountWithVAT){ return ($this->AmountWithVAT=$AmountWithVAT); }
	public function setstatus 			($status) 		{ return ($this->status=$status); }
	
	public function getAttributes()
  	{
		$list = array (	'Amount' 			=> $this->Amount,
				   		'VAT' 				=> $this->VAT,
				   		'AmountWithVAT' 	=> $this->AmountWithVAT,
				   		'status' 			=> $this->status);
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
  	
  	
  	public function init($Amount = null, $VAT = null, $AmountWithVAT = null, $status = 0)
  	{
  		$this->Amount			=$Amount;
  		$this->VAT				=$VAT;
  		$this->AmountWithVAT	=$AmountWithVAT;
  		$this->status			=$status;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Amount			=$array["Amount"];
  		$this->VAT				=$array["VAT"];
  		$this->AmountWithVAT	=$array["AmountWithVAT"];

  	}
}
