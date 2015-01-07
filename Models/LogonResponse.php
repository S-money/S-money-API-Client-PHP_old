<?php

class LogonResponse
{
	public $Token;
	public $TermsAndConditions;
	
	public function __construct()
	{
		$this->Token = new TokenResponse();
		$this->TermsAndConditions = new TermsAndConditions();
	}
	
	public function getToken() 					{return $this->Token;}
	public function getTermsAndConditions() 		{return $this->TermsAndConditions;}

	
	
	public function setToken 				($Token) 			{ return ($this->Token=$Token); }
	public function setTermsAndConditions	($TermsAndConditions){ return ($this->TermsAndConditions=$TermsAndConditions); }

   
	public function getAttributes ()
	{
		$list = array ('Token' 					=> $this->Token, 
					   'TermsAndConditions' 	=> $this->TermsAndConditions);
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
  	
	public function init($Token, $TermsAndConditions)
	{
		$this->Token=$Token;
		$this->TermsAndConditions=$TermsAndConditions;
	}
	
	public function initObject($array)
	{
		$this->Token=$array["Token"];
		$this->TermsAndConditions=$array["TermsAndConditions"];
	}
}

