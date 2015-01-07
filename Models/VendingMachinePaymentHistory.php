<?php

class VendingMachinePaymentHistory extends HistoryItem
{
	public $MerchantTransactionId;
	public $ProductTitle;
	public $MerchantName;
	
	public function __construct()
	{
		$this->MerchantTransactionId="";
		$this->ProductTitle="";
		$this->MerchantName="";
	}
	
	public function getMerchantTransactionId() 	{return $this->MerchantTransactionId;}
	public function getProductTitle() 			{return $this->ProductTitle;}
	public function getMerchantName()			{return $this->MerchantName;}
	
	
	public function setMerchantTransactionId 	($MerchantTransactionId){ return ($this->MerchantTransactionId=$MerchantTransactionId); }	
	public function setProductTitle 			($ProductTitle) 		{ return ($this->ProductTitle=$ProductTitle); }	
	public function setMerchantName 			($MerchantName) 		{ return ($this->MerchantName=$MerchantName); }
   
	public function getAttributes ()
	{
		$list = array ('MerchantTransactionId' 	=> $this->MerchantTransactionId, 
				       'ProductTitle' 	  		=> $this->ProductTitle,
				       'MerchantName' 	  		=> $this->MerchantName);
		return $list;
	}
	
	public function encodeJSON()
  	{
  		foreach ($this as $key => $value)
  			$json->$key = $value;
  		return json_encode($json);
  	}
  	
  	
  	public function init($MerchantTransactionId, $ProductTitle, $MerchantName)
  	{
  		$this->MerchantTransactionId	=$MerchantTransactionId;
  		$this->ProductTitle				=$ProductTitle;
  		$this->MerchantName				=$MerchantName;
  	}
  	
  	public function initObject($array)
  	{
  		$this->MerchantTransactionId	=$array["MerchantTransactionId"];
  		$this->ProductTitle				=$array["ProductTitle"];
  		$this->MerchantName				=$array["MerchantName"];
  	}
  	
}