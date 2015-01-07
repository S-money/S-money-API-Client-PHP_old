<?php
class MoneyOutClient extends SMoneyClient
{

/*	public function postRecurringMoneyOutQuote($MoneyOutQuote, $UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/moneyouts/recurring/quotes';
		else
			$Url ='moneyouts/recurring/quotes';
	
		return $this->postObject($MoneyOutQuote, $Url);
	}
	
	public function postOneShotMoneyOutQuote($MoneyOutQuote, $UserId)
	{
		if($UserId != null)
			$Url = 'moneyouts/'.$UserId.'/oneshot/quotes';
		else
			$Url = 'moneyouts/oneshot/quotes';
		return $this->postObject($MoneyOutQuote, $Url);
	}	*/
	
	public function postRecurringMoneyOut(MoneyOut $MoneyOut, $UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/moneyouts/recurring';
		else
			$Url ='moneyouts/recurring';
		
		return $this->postObject($MoneyOut, $Url);
	}
	
	public function postOneShotMoneyOut($MoneyOut, $UserId)
	{
		if($UserId != null)
			$Url ='users/'.$UserId.'/moneyouts/oneshot';
		else
			$Url ='moneyouts/oneshot';
	
		return $this->postObject($MoneyOut, $Url);
	}
	
	

	public function getMoneyOut($Id, $UserId)
	{
		if($UserId != null)
			$Url = 'users/'.$UserId.'/moneyouts/'.$Id;
		else 
			$Url = 'moneyouts/'.$Id;
	
		return $this->postObject("MoneyOut", $Url);
	}
	
	public function getMoneyOuts($UserId)
	{
		return $this->getObjectList('MoneyOut','users/'.$UserId.'/moneyouts');
	}
}
