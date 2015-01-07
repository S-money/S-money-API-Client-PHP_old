<?php

class BankAccountClient extends SMoneyClient
{

	public function getBankAccount($Id, $UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/bankaccounts/'.$Id;
		else 
			$Url ='bankaccounts/'.$Id;
		
		return $this->getObject('BankAccount', $Url);
	}
	
	
	public function getBankAccounts($UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/bankaccounts';
		else
			$Url ='bankaccounts/';
	
		return $this->getObjectList('BankAccount', $Url);
	}
	
	
	public function postBankAccount($BankAccount, $UserId)
	{
		if($UserId != null)
			$Url = 'users/'.$UserId.'/bankaccounts';
		else
			$Url = 'bankaccounts';
		
		return $this->postObject($BankAccount, $Url);
	}
	
	
	public function putBankAccount($BankAccount, $UserId)
	{
		if($UserId != null)
			$Url = 'users/'.$UserId.'/bankaccounts';
		else
			$Url = 'bankaccounts';
		
		return $this->putObject($BankAccount, $Url);
	}
	
	
	public function deleteBankAccount($Id, $UserId)
	{
		if($UserId != null)
			$Url =$this->baseUrl.'users/'.$UserId.'/bankaccounts/'.$Id;
		else
			$Url =$this->baseUrl.'bankaccounts/'.$Id;
	
		$Client = new Motor($Url, $this->token);
		$result = $Client->deleteData();
		
		if($result['content']['Code'] != null)
		{
			return $result;
		}
		else
		{
			return $result;
		}
	}
	
}
