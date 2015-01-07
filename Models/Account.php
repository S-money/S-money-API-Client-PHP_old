<?php

class Account
{
	public $id;
	public $appaccountid;
	public $amount;
	public $displayname;
	public $isdefault;
	
	public function __construct()
	{
		$this->id					= null;
		$this->appaccountid			="";
		$this->displayname			="";
		$this->amount 				=0;
		$this->isdefault			=false;
	}
	
	public function getId() 			{return $this->id;}
	public function getAppAccountId() 	{return $this->appaccountid;}
	public function getAmount()			{return $this->amount;}
	public function getDisplayName() 	{return $this->displayname;}
	public function getIsDefault()		{return $this->isdefault;}
	
	
	public function setId 			($Id) 			{ return ($this->id=$Id); }
	public function setAppAccountId ($AppAccountId) { return ($this->appaccountid=$AppAccountId); }
	public function setAmount 		($Amount) 		{ return ($this->amount=$Amount); }
	public function setDisplayName  ($DisplayName)  { return ($this->displayname=$DisplayName); }
	public function setIsDefault 	($IsDefault) 	{ return ($this->isdefault=$IsDefault); }

	public function getAttributes ()
	{
		$list = array (
			'id'           => $this->id, 
			'appaccountid' => $this->appaccountid, 
			'amount'       => $this->amount, 
			'displayName'  => $this->displayname,
			'isdefault'    => $this->isdefault
		);

		return $list;
	}

	public function encodeJSON()
	{
		$json = new StdClass();

		foreach ($this as $key => $value) {
			if(is_null($value)) continue;
				$lowerKey = strtolower($key);

			$json->$lowerKey = $value;
		}
		return json_encode($json);
	}

	public function edit($DisplayName)
	{
		$this->displayname=$DisplayName;
	}

	public function init($AppAccountId, $DisplayName)
	{
		$this->appaccountid=$AppAccountId;
		$this->displayname=$DisplayName;
	}

	public function initObject($array)
	{
		$this->id           = $array["Id"];
		$this->appaccountid = $array["AppAccountId"];
		$this->amount       = $array["Amount"];
		$this->displayname  = $array["DisplayName"];
		$this->isdefault    = $array["IsDefault"];
	}
}