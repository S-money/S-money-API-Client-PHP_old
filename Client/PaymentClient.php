<?php

class PaymentClient extends SMoneyClient
{

	public function getPayment($Id, $UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/payments/'.$Id;
		else 
			$Url ='payments/'.$Id;
		return $this->getObject('Payment', $Url);
	}
	
	public function getPayments($UserId)
	{
		return $this->getObjectList('Payment', 'users/'.$UserId.'/payments');
	}
	

	public function postPayment($Payment, $UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/payments';
		else
			$Url ='payments';
		
		return $this->postObject($Payment, $Url);
	}
	
}
