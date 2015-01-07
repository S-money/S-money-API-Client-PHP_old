<?php


class SPExtraResultCodes
{
	public $RiskControlResult;
	public $BankAuthResult;
	public $ThreedsResult;
	public $WarrantyResult;
	
	
	public function __construct()
	{
		$this->RiskControlResult=0;
		$this->BankAuthResult=0;
		$this->ThreedsResult=0;
		$this->WarrantyResult=false;
	}
	
	public function getRiskControlResult() 	{return $this->RiskControlResult;}
	public function getBankAuthResult() 	{return $this->BankAuthResult;}
	public function getThreedsResult()		{return $this->ThreedsResult;}
	public function getWarrantyResult()		{return $this->WarrantyResult;}
	
	
	public function setRiskControlResult  ($RiskControlResult)  { return ($this->RiskControlResult=$RiskControlResult); }
	public function setBankAuthResult 	  ($BankAuthResult) 	{ return ($this->BankAuthResult=$BankAuthResult); }
	public function setThreedsResult   	  ($ThreedsResult) 	  	{ return ($this->ThreedsResult=$ThreedsResult); }
	public function setCountry 			  ($WarrantyResult) 	{ return ($this->WarrantyResult=$WarrantyResult); }
	
	
	public function getAttributes ()
	{
		$list = array ('RiskControlResult'  => $this->RiskControlResult, 
					   'BankAuthResult' 	=> $this->BankAuthResult, 
					   'ThreedsResult'  	=> $this->ThreedsResult, 
					   'WarrantyResult' 	=> $this->WarrantyResult);
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
  	
  	
  	public function init($RiskControlResult, $BankAuthResult, $ThreedsResult, $WarrantyResult)
  	{
  		$this->RiskControlResult=$RiskControlResult;
  		$this->BankAuthResult=$BankAuthResult;
  		$this->ThreedsResult=$ThreedsResult;
  		$this->WarrantyResult=$WarrantyResult;
  	}
  	
  	
  	public function initObject($array)
  	{
  		$this->RiskControlResult=$array["RiskControlResult"];
  		$this->BankAuthResult=$array["BankAuthResult"];
  		$this->ThreedsResult=$array["ThreedsResult"];
  		$this->WarrantyResult=$array["WarrantyResult"];
  	}
}

