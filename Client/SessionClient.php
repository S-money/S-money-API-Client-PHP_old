<?php

class SessionClient extends SMoneyClient
{

	public function getSession($UserId, $SecureToken )
	{
		$Url =$this->baseUrl.'sessions?userId='.$UserId.'&secureToken='.$SecureToken;
		
		$Client = new Motor($Url, $this->token);
		$result = $Client->getData();
		
		return $resultat;
	}
}
