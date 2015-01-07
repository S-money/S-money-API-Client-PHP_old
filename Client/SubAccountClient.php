<?php

class SubAccountClient extends SMoneyClient
{

	public function getSubAccount($Identifier, $UserId = null)
	{
		$Identifier = (string) $Identifier;
		if($UserId != null)
			$Url = 'users/'.$UserId.'/subaccounts/'.$Identifier;
		else 
			$Url = 'subaccounts/'.$Identifier;
		return $this->getObject('Account', $Url);
	}
	
	public function getSubAccounts($UserId = null)
	{
		if($UserId != null)
			$Url = 'users/'.$UserId.'/subaccounts';
		else
			$Url = 'subaccounts';

		return $this->getObjectList('Account', $Url);
	}

	public function postSubAccount($SubAccount, $UserId = null)
	{
		if($UserId != null)
			$Url = 'users/'.$UserId.'/subaccounts';
		else
			$Url = 'subaccounts';
		
		return $this->postObject($SubAccount, $Url);
	}
	
	
	public function putSubAccount($Identifier, $SubAccount, $UserId)
	{
		$Identifier = (string) $Identifier;
		if($UserId != null)
			$Url ='users/'.$UserId.'/subaccounts/'.$Identifier;
		else
			$Url ='subaccounts/'.$Identifier;
	
		return $this->putObject($SubAccount, $Url);
	}
	
	
	public function deleteSubAccount($Identifier, $UserId)
	{
		$Identifier = (string) $Identifier;
		if($UserId != null)
			$Url =$this->baseUrl.'users/'.$UserId.'/subaccounts/'.$Identifier;
		else
			$Url =$this->baseUrl.'subaccounts/'.$Identifier;
		
		$Client = new Motor($Url, $this->token);
		$result = $Client->deleteData();
	
		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} else {
			return $result;
		}
	}
	
}
