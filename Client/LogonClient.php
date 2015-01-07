<?php

class LogonClient extends SMoneyClient
{
	public function postLogon($username, $smoneyToken, $clientName)
	{
		$Url =$this->baseUrl.'logon/'.$clientName;
		
		$Client = new Motor($Url , $this->token);
		
		
		$result = $Client->postData();
		
		$result = $result['content'];
		
		return $result;
	}
	
}
