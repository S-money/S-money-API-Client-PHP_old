<?php

class SMoneyClient {

	protected $baseUrl;
	protected $token;
	protected $version = 1;

	public function getBaseUrl() 			{return $this->baseUrl;}
	public function getToken() 			{return $this->token;}
	
	
	public function setBaseUrl ($baseUrl) 	{ return ($this->baseUrl=$baseUrl); }
	public function setToken ($token) 		{ return ($this->token=$token); }

	public function __construct($baseUrl, $token)
	{
		$this->setBaseUrl($baseUrl);
		$this->setToken($token);
	}

	protected static function isReponseValid($result)
	{
		if($result == false 
			|| !isset($result['content']) 
			|| (isset($result['content']['Code']) && $result['content']['Code'] != null) 
			|| (isset($result['content']['Message']) && $result['content']['Message'] =="The request is invalid.")) 
		{
			return false;
		}
		return true;
	}

	/**
	 * Throw an Exception 
	 * @return [type] [description]
	 */
	protected function handleError($response)
	{
		$Message = "Erreur inconnue ";
		if(isset($response['content']['ErrorMessage'])) {
			$Message = $response['content']['ErrorMessage'];
		} elseif($response['content']['Message']) {
			$Message = $response['content']['Message'];
		}

		$ErrorCode = (isset($response['content']['Code'])) ? $response['content']['Code']: $response['headers']['http_code'];
		throw new ExceptionClient($Message, $ErrorCode);
	}


	public function hydrateResult($data, $className)
	{
		if(!class_exists($className)) return false;

		$Object = new $className();
		$Object->initObject($data);
		return $Object;
	}

	public function postObject($Object, $Url)
	{
		$Url = $this->baseUrl.$Url;
		$Client = new Motor($Url , $this->token);
		$Client->setVersion($this->version);
		$result = $Client->postData($Object->encodeJSON());

		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} 
		return $this->hydrateResult($result['content'], get_class($Object));
	}

	public function putObject($Object, $Url)
	{
		$Url = $this->baseUrl.$Url;
		$Client = new Motor($Url , $this->token);
		$Client->setVersion($this->version);
		$result = $Client->putData($Object->encodeJSON());
		
		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} 
		return $this->hydrateResult($result['content'], get_class($Object));
	}

	public function getObject($ObjectClass, $Url)
	{
		$Url = $this->baseUrl.$Url;
		$Client = new Motor($Url , $this->token);
		$Client->setVersion($this->version);
		$result = $Client->getData();
		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} 
		return $this->hydrateResult($result['content'], $ObjectClass);
	}

	public function getObjectList($ObjectClass, $Url)
	{
		$Url = $this->baseUrl.$Url;
		$Client = new Motor($Url , $this->token);
		$Client->setVersion($this->version);
		$result = $Client->getData();
		
		if(!self::isReponseValid($result)) {
			return $this->handleError($result);
		} 

		$list = array();
		if(count($result['content'])) {
			foreach($result['content'] as $item) {
				$list[] = $this->hydrateResult($item, $ObjectClass);
			}
		}
		return $list;
	}


}