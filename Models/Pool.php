<?php

class Pool
{
	public $Id;
	public $AppAccountId;
	public $Name;
	public $ExpirationDate;
	public $Amount;
	public $GoalAmount;
	public $CumulatedAmount;
	public $Motive;
	public $Description;
	public $LastOperation;
	public $Contribution;
	
	
	public function __construct()
	{
		$this->Id=0;
		$this->AppAccountId="";
		$this->Name="";
		$this->ExpirationDate="";
		$this->Amount= 0;
		$this->GoalAmount=0;
		$this->CumulatedAmount=0;
		$this->Motive="";
		$this->Description="";
		$this->LastOperation=new HistoryItem();
		$this->Contribution=new ContributionNotification();
	}
	
	public function getId() 				{return $this->Id;}
	public function getAppAccountId() 		{return $this->AppAccountId;}
	public function getName() 				{return $this->Name;}
	public function getGoalAmount()			{return $this->GoalAmount;}
	public function getCumulatedAmount()	{return $this->CumulatedAmount;}
	public function getMotive() 			{return $this->Motive;}
	public function getDescription() 		{return $this->Description;}
	public function getLastOperation()		{return $this->LastOperation;}
	public function getContribution()		{return $this->Contribution;}

	
	
	public function setId 				($Id) 				{ return ($this->Id=$Id); }
	public function setAppAccountId 	($AppAccountId) 	{ return ($this->AppAccountId=$AppAccountId); }
	public function setName 			($Name) 			{ return ($this->Name=$Name); }
	public function setGoalAmount 		($GoalAmount) 		{ return ($this->GoalAmount=$GoalAmount); }
	public function setCumulatedAmount 	($CumulatedAmount) 	{ return ($this->CumulatedAmount=$CumulatedAmount); }
	public function setMotive  			($Motive)  			{ return ($this->Motive=$Motive); }
	public function setDescription 		($Description) 		{ return ($this->Description=$Description); }
	public function setLastOperation 	($LastOperation)	{ return ($this->LastOperation=$LastOperation); }
	public function setContribution 	($Contribution) 	{ return ($this->Contribution=$Contribution); }
	
	public function getAttributes ()
	{
		$list = array ('Id' 				=> $this->Id, 
					   'AppAccountId' 		=> $this->AppAccountId,
					   'Name' 				=> $this->Name,
					   'GoalAmount' 		=> $this->GoalAmount,
					   'CumulatedAmount'	=> $this->CumulatedAmount,
					   'Motive'     		=> $this->Motive, 
					   'Description' 		=> $this->Description, 
					   'LastOperation'  	=> $this->LastOperation,
					   'Contribution'		=> $this->Contribution);
		return $list;
	}
}