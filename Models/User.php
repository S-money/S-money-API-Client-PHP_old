<?php

class User
{
	public $Id;
	public $AppUserId;
	public $Role;
	public $Profile;
	public $Amount;
	public $SubAccounts;
	public $BankAccounts;
	public $CBCards;
	public $Status;
	
	
	public function __construct()
	{
		$this->Id           = 0;
		$this->AppUserId    ="";
		$this->Role         = new ClientRole(ClientRole::$clientRole["Standard"]);
		$this->Profile      = new UserProfile();
		$this->Amount       = 0;
		$this->SubAccounts  = array();
		$this->BankAccounts = array();
		$this->CBCards      = array();
		$this->Status       = new UserStatus();
	}
	
	
	public function getId() 			{return $this->Id;}
	public function getAppUserId() 		{return $this->AppUserId;}
	public function getRole()			{return $this->Role;}
	public function getProfile() 		{return $this->Profile;}
	public function getAmount()			{return $this->Amount;}
	public function getSubAccounts()	{return $this->SubAccounts;}
	public function getBankAccounts() 	{return $this->BankAccounts;}
	public function getCBCards() 		{return $this->CBCards;}
	public function getStatus() 		{return $this->Status->getValue();}
	
	
	public function setId 				($Id) 				{ return ($this->Id=$Id); }
	public function setAppUserId 		($AppUserId) 		{ return ($this->AppUserId=$AppUserId); }
	public function setRole 			($Role) 			{ return ($this->Role=$Role); }
	public function setProfile 			($Profile) 			{ return ($this->Profile=$Profile); }
	public function setAmount 			($Amount) 			{ return ($this->Amount=$Amount); }
	public function setSubAccounts 		($SubAccounts) 		{ return ($this->SubAccounts=$SubAccounts); }
	public function setBankAccounts 	($BankAccounts) 	{ return ($this->BankAccounts=$BankAccounts); }
	public function setCBCards 			($CBCards) 			{ return ($this->CBCards=$CBCards); }
	public function setStatus			($Status)			{ return ($this->Status = $Status); }	

	public function getAttributes ()
  	{
		$list = array (	'Id' 		  		=> $this->Id, 
				   		'AppUserId' 	  	=> $this->AppUserId, 
				   		'Role' 	  			=> $this->Role, 
				   		'Profile' 			=> $this->Profile,
				   		'Amount' 			=> $this->Amount,
				   		'SubAccounts' 		=> $this->SubAccounts,
				   		'BankAccounts' 		=> $this->BankAccounts,
				   		'CBCards' 	  		=> $this->CBCards,  
				   		'Status'    		=> $this->Status);
		return $list;
  	}

  	public function encodeJSON()
  	{
  	    $json = new StdClass();
  		foreach ($this as $key => $value){

  			$lowerKey = strtolower($key);
  			if (is_object($this->$key) && method_exists($this->$key, 'encodeJson')) {
  				$value = json_decode($this->$key->encodeJson());
  			} 

  			if (!empty($value)) {
  				$json->$lowerKey = $value;
  			}
  		}

  		return json_encode($json);
  	}

  	public function init($Id, $AppUserId, $Role, $Profile, $Amount, $SubAccounts, 
  								$BankAccounts, $CBCards, $Status)
  	{
  		$this->Id				=$Id;
		$this->AppUserId		=$AppUserId;
		$this->Role				=$Role;
		$this->Profile			=$Profile;
		$this->Amount			=$Amount;
		$this->SubAccounts		=$SubAccounts;
		$this->BankAccounts		=$BankAccounts;
		$this->CBCards			=$CBCards;
		$this->Status			=$Status;
  	}

  	public function initObject($array)
  	{
  		$this->Id				=$array["Id"];
		$this->AppUserId		=$array["AppUserId"];
		$this->Role				=$array["Role"];
		$userProfile 			=new UserProfile();
		$userProfile			->initObject($array["Profile"]);
		$this->Profile			=$userProfile;
		$this->Amount			=$array["Amount"];
		
		$arrayAccount = $arraybankAccountref = $arraycbc = array();
		if (isset($array["SubAccounts"])) {
			foreach ($array["SubAccounts"] as $value)
			{
				$account = new Account();
				$account->initObject($value);
				$arrayAccount[]=$account;
			}
		}
		$this->SubAccounts = $arrayAccount;
		
		/**/

		if (isset($array["BankAccounts"])) {
			foreach ($array["BankAccounts"] as $value) {
				$bankaccountref = new BankAccountRef();
				$bankaccountref->initObject($value);
				$arraybankAccountref[] =$bankaccountref;
			}
		}
		$this->BankAccounts	= $arraybankAccountref;
		
		/**/
		if (isset($array["CBCards"])) {
			foreach ($array["CBCards"] as $value) {
				$cbc = new CBCardRef();
				$cbc->initObject($value);
				$arraycbc[]=$cbc;
			}
		}
		$this->CBCards = $arraycbc;
		
		$this->Status = $array["Status"];
  	}

  	/**
  	 * Retourne le compte principal
  	 * @return [type] [description]
  	 */
  	public function getDefaultAccount()
	{
		foreach ($this->SubAccounts as $Account) {
			if ($Account->getIsDefault() == true) {
				return $Account;
			}
		}
		return false;
	}

	/**
	 * Retourne le sous-compte investisseur
	 * @return [type] [description]
	 */
	public function getSubAccount()
	{
		foreach ($this->SubAccounts as $Account) {
			if ($Account->getIsDefault() == false) {
				return $Account;
			}
		}
		return false;
	}
}