<?php

require_once __DIR__.'/motor/Motor.php';
require_once __DIR__.'/../Models/User.php';
require_once __DIR__.'/../Models/UserProfile.php';
require_once __DIR__.'/../Models/enumerations/UserStatus.php';
require_once __DIR__.'/../Models/TermsAndConditions.php';


class UserClient extends SMoneyClient
{

	public function getUser($Identifier)
	{
		return $this->getObject('User','users/'.$Identifier);		
	}
	
	
	public function getUsers()
	{
		return $this->getObjectList('User', 'users');
	}
	
	public function SearchUser($firstname, $lastname, $email)
	{
	
		$Url =$this->baseUrl.'users/search'."?firstname=".$firstname."&lastname=".$lastname."&email=".$email;
		$Client  = new Motor($Url, $this->token);
		$result  = $Client->getData();
		return $this->hydrateResult($result['content'], 'User');	
	}
	
	public function postUser($User)
	{
		return $this->postObject($User, 'users');	
	}
	
	
	public function putUser($Identifier, $User)
	{
		$Identifier = (string) $Identifier;
		$Url = (!is_null($Identifier)) ? 'users' :'users/'.$Identifier;
		return $this->putObject('User', $Url);
	}
	

	public function getUserTermsAndConditions()
	{
		return $this->getObject('TermsAndConditions', 'users/termsandconditions');
	}
	
		
	public function putUserTermsAndConditions($TermsAndConditions)
	{
		return $this->putObject($TermsAndConditions, 'users/termsandconditions');	
	}
	
	public function closeUser($Identifier = null)
	{
		$Url =$this->baseUrl.'users/'.$Identifier;
		
		$User = new User();
		$User->setStatus(UserStatus::$userStatus["Closed"]);
		
		$Client = new Motor($Url , $this->token);
		$User=$User->encodeJSON();
		$result = $Client->putData($User);
		
		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} 

		return $this->hydrateResult($result['content'], 'User');	
	}

}
