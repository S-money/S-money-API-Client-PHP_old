<?php

// la function getAttributes n est pas complete

class EcommercePaymentHistory extends HistoryItem
{
	public $MerchantTransactionId;
	public $MerchantName;
	public $MerchantImageUrl;
	
	public function __construct()
	{
		parent::__construct();
		$this->MerchantTransactionId="";
		$this->MerchantName="";
		$this->MerchantImageUrl="";
	}
	
	public function getMerchantTransactionId() 		{return $this->MerchantTransactionId;}
	public function getMerchantName() 				{return $this->MerchantName;}
	public function getMerchantImageUrl()			{return $this->MerchantImageUrl;}
	
	
	public function setMerchantTransactionId 	($MerchantTransactionId) 	{ return ($this->MerchantTransactionId=$MerchantTransactionId); }	
	public function setMerchantName 			($MerchantName) 			{ return ($this->MerchantName=$MerchantName); }	
	public function setMerchantImageUrl 		($MerchantImageUrl) 		{ return ($this->MerchantImageUrl=$MerchantImageUrl); }
   
	public function getAttributes ()
	{
		return array ('MerchantTransactionId' 	=> $this->MerchantTransactionId, 
					   'MerchantName' 	  		=> $this->MerchantName,
					   'MerchantImageUrl' 	  	=> $this->MerchantImageUrl);
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
  	
  	
  	public function init($MerchantTransactionId, $MerchantName, $MerchantImageUrl)
  	{
  		$this->MerchantTransactionId	=$MerchantTransactionId;
  		$this->MerchantName				=$MerchantName;
  		$this->MerchantImageUrl			=$MerchantImageUrl;
  	}
  	
  	public function initObject($array)
  	{
  		$this->MerchantTransactionId	=$array["MerchantTransactionId"];
  		$this->MerchantName				=$array["MerchantName"];
  		$this->MerchantImageUrl			=$array["MerchantImageUrl"];
  	}
}
