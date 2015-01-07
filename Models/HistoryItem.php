<?php

class HistoryItem
{
	public $Id;
	public $Account;
	public $OperationDate;
	public $Amount;
	public $Label;
	public $Attachment;
	public $IsNew;
	public $Type;
	public $Direction;
	public $Status;
	
	public function __construct()
	{
		$this->Id=0;
		$this->Account= new Account();
		$this->OperationDate="";
		$this->Amount=0;
		$this->Label="";
		$this->Attachment=new Attachment();
		$this->IsNew=false;
		$this->Type= new HistoryItemType();
		$this->Status= new HistoryItemStatus();
		$this->Direction = 0;
	}
	
	public function getId() 				{return $this->Id;}
	public function getAccount() 			{return $this->Account;}
	public function getOperationDate() 		{return $this->OperationDate;}
	public function getAmount()				{return $this->Amount;}
	public function getLabel()				{return $this->Label;}
	public function getAttachment() 		{return $this->Attachment;}
	public function getIsNew() 				{return $this->IsNew;}
	public function getType() 				{return $this->Type;}
	public function getStatus()				{return $this->Status;}
	public function getDirection()				{return $this->Direction;}
	
	
	public function setId 					($Id) 					{ return ($this->Id=$Id); }
	public function setAccount 				($Account) 				{ return ($this->Account=$Account); }	
	public function setOperationDate 		($OperationDate) 		{ return ($this->OperationDate=$OperationDate); }	
	public function setAmount 				($Amount) 				{ return ($this->Amount=$Amount); }
	public function setLabel 				($Label) 				{ return ($this->Label=$Label); }
	public function setAttachment 			($Attachment) 			{ return ($this->Attachment=$Attachment); }
	public function setIsNew 				($IsNew) 				{ return ($this->IsNew=$IsNew); }	
	public function setType 				($Type) 				{ return ($this->Type=$Type); }	
	public function setOperationDirection 	($OperationDirection) 	{ return ($this->OperationDirection=$OperationDirection); }
	public function setStatus				($Status) 				{ return ($this->Status=$Status); }


	public function getAttributes ()
	{
		$list = array ('Id' 					=> $this->Id, 
					   'Account' 				=> $this->Account, 
					   'OperationDate' 	 		=> $this->OperationDate,
					   'Amount' 	  			=> $this->Amount,  
				       'Label'    				=> $this->Label,
					   'Attachment' 			=> $this->Attachment, 
					   'IsNew' 					=> $this->IsNew, 
					   'Type' 	 				=> $this->Type,
					   'OperationDirection' 	=> $this->OperationDirection,  
				       'Status'    				=> $this->Status);
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
  	
  	
  	
  	public function init($Id, $Account, $OperationDate, $Label, $Attachment, $IsNew, $Type, $OperationDirection, $Status)
  	{
  		$this->Id					=$Id;
  		$this->Account				=$Account;
  		$this->OperationDate		=$OperationDate;
  		$this->Label				=$Label;
  		$this->Attachment			=$Attachment;
		$this->IsNew				=$IsNew;
		$this->Type					=$Type;
		$this->OperationDirection	=$OperationDirection;
		$this->Status				=$Status;
  	}
  	
  	public function initObject($array)
  	{
  		$this->Id					=$array["Id"];
  		$this->Account				=$array["Account"];
  		$this->OperationDate		=$array["OperationDate"];
  		$this->Label				=$array["Label"];
  		$this->Attachment			=$array["Attachment"];
		$this->IsNew				=$array["IsNew"];
		$this->Type					=$array["Type"];
		$this->Amount				=$array["Amount"];
		$this->Direction			=$array["Direction"];
		$this->Status				=$array["Status"];
  	}
}
