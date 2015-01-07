<?php

class KYCClient extends SMoneyClient
{

	public function postKYCDemand($files, $UserId)
	{
		if($UserId != null)
			$Url =$this->baseUrl.'users/'.$UserId.'/kyc';
		else
			$Url =$this->baseUrl.'kyc';
	
		$Client = new Motor($Url , $this->token);
	
		/*$SubAccount=$SubAccount->encodeJSON();
		$result = $Client->postData($SubAccount);*/
	
		$kyc = $result['content'];
		$kyc = new KYCDemand();
		$kyc->initObject($kyc);
	
		return $kyc;
	}
	
	
	public function getKYCDemand($Id, $UserId)
	{
		if($UserId != null)
			$Url =$this->baseUrl.'users/'.$UserId.'/kyc/'.$Id;
		else 
			$Url =$this->baseUrl.'kyc/'.$Id;
		
		$Client  = new Motor($Url, $this->token);
		$result  = $Client->getData();
		$array   = $result['content'];
		$kyc = new KYCDemand();
		$kyc->initObject($array);
		
		return $kyc;
	}
	
	
	
	public function getKYCDemands($UserId)
	{
		if($UserId != null)
			$Url =$this->baseUrl.'users/'.$UserId.'/kyc/';
		else
			$Url =$this->baseUrl.'kyc/';
	
		$Client = new Motor($Url , $this->token);
		
		$result = $Client->getData();
		
		if($result['content']['Code'] != null)
		{
			return $result;
		}
		else
		{
			$a;
			$result   = $result['content'];
			if($a!=$result)
			{
				foreach ($result as $value)
				{
					$kyc = new KYCDemand();
					$kyc->initObject($kyc);
					$arrayResult[] = $kyc;
				}
				return $arrayResult;
			}
			else
				return "Aucunes Valeurs";
		}
	}
}
