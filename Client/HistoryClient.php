<?php

class HistoryClient extends SMoneyClient
{
	
	public function getItems($userId)
	{
		$Url = 'users/'.$userId.'/historyitems';
		$Url = $this->baseUrl.$Url;
		$Client = new Motor($Url , $this->token);
		$result = $Client->getData();
		
		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} 

		$list = array();
		if(count($result['content'])) {
			foreach($result['content'] as $item) {
				switch($item['Type']) {
					case 0:
						$ObjectClass = "PaymentHistory";
						break;
					case 1:
						$ObjectClass = 'MoneyInHistory';
						break;
					case 2:
						$ObjectClass = 'MoneyOutHistory';
						break;
					default:
						$ObjectClass = 'HistoryItem';
						break;
				}
				$list[] = $this->hydrateResult($item, $ObjectClass);
			}
		}
		return $list;
	}
}
