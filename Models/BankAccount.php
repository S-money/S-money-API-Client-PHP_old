<?php

class BankAccount
{
	public $Id;
	public $DisplayName;
	public $Bic;
	public $Iban;
	public $IsMine;

	public function __construct()
	{
		$this->Id= null;
		$this->DisplayName="";
		$this->Bic="";
		$this->Iban=0;
		$this->IsMine=false;
	}

	public function getId() 			{return $this->Id;}
	public function getDisplayName() 	{return $this->DisplayName;}
	public function getBic() 			{return $this->Bic;}
	public function getIban()			{return $this->Iban;}
	public function getIsMine()			{return $this->IsMine;}


	public function setId 			($Id) 			{ return ($this->Id=$Id); }
	public function setDisplayName 	($DisplayName)  { return ($this->DisplayName=$DisplayName); }
	public function setBic 			($Bic) 			{ return ($this->Bic=$Bic); }
	public function setIban 		($Iban) 		{ return ($this->Iban=$Iban); }
	public function setIsMine 		($IsMine) 		{ return ($this->IsMine=$IsMine); }
	
	
	public function getAttributes ()
	{
		$list = array ('Id' 		  => $this->Id,
				       'DisplayName'  => $this->DisplayName,
				       'Bic' 	  	  => $this->Bic,
				       'Iban' 	  	  => $this->Iban,
				       'IsMine'    	  => $this->IsMine);
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
	
	public function edit($id, $DisplayName)
	{
		$this->Id=$id;
		$this->DisplayName=$DisplayName;
	}
	
	
	public function init($DisplayName, $Bic, $Iban, $IsMine)
	{
		$this->DisplayName=$DisplayName;
		$this->Bic=$Bic;
		$this->Iban=$Iban;
		$this->IsMine=$IsMine;
	}
	
	public function initObject($array)
	{
		$this->Id			=$array["Id"];
		$this->DisplayName	=$array["DisplayName"];
		$this->Bic			=$array["Bic"];
		$this->Iban			=$array["Iban"];
		$this->IsMine		=$array["IsMine"];
	}
}
