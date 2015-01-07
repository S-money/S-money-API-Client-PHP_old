<?php

class PayIn
{
	protected $id;
	protected $paymentDate;
	protected $beneficiary;
	protected $status;
	protected $amount;
	protected $message;
	protected $fee;
	
	public function __construct()
	{
		$this->id= null;
		$this->paymentDate=date(DateTime::ATOM);
		$this->beneficiary = new AccountRef();
		$this->status = MoneyOperationStatus::$moneyOperationStatus["Pending"];
		$this->amount=0;
		$this->message="";
		$this->fee = new Fee();
	}
	
	public function getId() 		{return $this->id;}
	public function getPaymentDate(){return $this->paymentDate;}
	public function getBeneficiary(){return $this->beneficiary;}
	public function getStatus() 	{return $this->status;}
	public function getAmount()		{return $this->amount;}
	public function getMessage()	{return $this->message;}
	public function getFee() 		{return $this->fee;}
	
	
	public function setId 			($id) 			{ return ($this->id=$id); }
	public function setPaymentDate 	($PaymentDate) 	{ return ($this->paymentDate=$PaymentDate); }
	public function setBeneficiary 	($beneficiary) 	{ return ($this->beneficiary=$beneficiary); }
	public function setStatus 		($status) 		{ return ($this->status=$status); }
	public function setAmount 		($amount) 		{ return ($this->amount=$amount); }
	public function setMessage 		($message) 		{ return ($this->message=$message); }
	public function setFee 			($fee) 			{ return ($this->fee=$fee); }
   
	public function getAttributes ()
	{
		$list = array ('id' 			=> $this->id, 
					   'paymentDate' 	=> $this->paymentDate, 
					   'beneficiary' 	=> $this->beneficiary, 
				       'status' 		=> $this->status,
				       'amount' 		=> $this->amount,
				       'message' 		=> $this->message,
				       'fee' 			=> $this->fee);
		return $list;
	}
	
  	public function encodeJSON()
  	{
  	    $json = new StdClass();
  		foreach ($this as $key => $value){
  			if(is_null($value)) continue;
  			$json->$key = $value;
  		}
  		return json_encode($json);
  	}
  	
  	
  	public function init($amount, $beneficiary = null, $message ="", $fee = null)
  	{
  		$this->amount			=$amount;
  		$this->beneficiary		=$beneficiary;
		$this->message			=$message;
		$this->fee				=$fee;
  	}
  	
  	public function initObject($array)
  	{
		$this->id          = $array["Id"];
		$this->paymentDate = date(DateTime::ATOM, strtotime($array["PaymentDate"])); 
		
		
		/*********/
		$accountRef        = new AccountRef();
		$accountRef->initObject($array["Beneficiary"]);
		$this->beneficiary =$accountRef;	
		
		
		/*********/
		$status            = new MoneyOperationStatus($array["Status"]);
		$this->status      =$status;
		
		
		$this->amount      =$array["Amount"];
		$this->message     =$array["Message"];
		
		
		/*********/
		if(isset($array["Fee"])) {
			$fee = new Fee();
			$fee->initObject($array["Fee"]);
			$this->fee=$fee;
		}
  	}
	
	
}
