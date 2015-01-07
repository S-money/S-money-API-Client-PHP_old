<?php

class TokenResponse
{
	public $AccessToken;
	public $TokenType;
	public $ExpiresIn;
	public $RefreshToken;
	public $Scope;
	
	
	public function __construct()
	{
		$this->AccessToken	="";
		$this->TokenType	= new TokenType();
		$this->ExpiresIn	=0;
		$this->RefreshToken	="";
		$this->Scope		= new OAuthScope();

	}
	
	public function getAccessToken() 	{return $this->AccessToken;}
	public function getTokenType() 		{return $this->TokenType;}
	public function getExpiresIn()		{return $this->ExpiresIn;}
	public function getRefreshToken() 	{return $this->RefreshToken;}
	public function getScope()			{return $this->Scope;}
	
	
	public function setAccessToken 		($AccessToken) 		{ return ($this->AccessToken=$AccessToken); }
	public function setTokenType 		($TokenType) 		{ return ($this->TokenType=$TokenType); }
	public function setExpiresIn 		($ExpiresIn) 		{ return ($this->ExpiresIn=$ExpiresIn); }
	public function setRefreshToken 	($RefreshToken) 	{ return ($this->RefreshToken=$RefreshToken); }
	public function setScope 			($Scope) 			{ return ($this->Scope=$Scope); }
   
	public function getAttributes ()
  	{
		$list = array (	'AccessToken' 		=> $this->AccessToken, 
				   		'TokenType' 	  	=> $this->TokenType->getAttributes(), 
				   		'ExpiresIn' 	  	=> $this->ExpiresIn, 
				   		'RefreshToken' 		=> $this->RefreshToken,
				   		'Scope' 			=> $this->Scope->getAttributes());
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
  	
  	
  	public function init($AccessToken, $TokenType, $ExpiresIn, $RefreshToken, $Scope)
  	{
  		$this->AccessToken	=$AccessToken;
  		$this->TokenType	=$TokenType;
  		$this->ExpiresIn	=$ExpiresIn;
  		$this->RefreshToken	=$RefreshToken;
  		$this->Scope		=$Scope;
  	}
  	
  	public function initObject($array)
  	{
  		$this->AccessToken	=$array["AccessToken"];
  		$this->TokenType	=$array["TokenType"];
  		$this->ExpiresIn	=$array["ExpiresIn"];
  		$this->RefreshToken	=$array["RefreshToken"];
  		$this->Scope		=$array["Scope"];
  	}
}

