<?php


class PayInClient extends SMoneyClient
{
	protected $version = 2;

	public function getPayIns($UserId)
	{
		if($UserId != null)
			$Url = 'users/'.$UserId.'/payins/';
		else 
			$Url = 'payins/';
		return $this->getObjectList('PayIn', $Url);	
	}
	
	public function getPayInCard($UserId, $Id)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/payins/cardpayments/'.$Id;
		else
			$Url ='payins/cardpayments/'.$Id;
	
		return $this->getObject('PayInCard', $Url);
	}
	
	public function postPayInCard($payInCard, $UserId)
	{	
		if($UserId != null)
			$Url = 'users/'.$UserId.'/payins/cardpayments';
		else
			$Url = 'payins/cardpayments';
		
		return $this->postObject($payInCard, $Url);
	}
	
}
