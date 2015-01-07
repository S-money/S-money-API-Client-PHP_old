<?php

class Motor
{

	private $_url;
	private $token;
	private $version = 2;

	public function __construct($_url , $token)
	{
		$this->setUrl($_url);
		$this->setToken($token);
	}

	public function setUrl 	($pUrl)			{ return $this->_url = $pUrl; }
	public function setToken ($token) 		{ return ($this->token=$token); }
	public function setVersion($version)	{ return ($this->version=$version);}

	public function getData ($pParams = array())
	{
		return $this->_launch($this->_makeUrl($pParams), 'GET');
	}
	
	public function postData ($pPostParams, $pGetParams=array())
	{
		return $this->_launch($this->_makeUrl($pGetParams), 'POST', $pPostParams);
	}
	
	public function putData ($pContent, $pGetParams = array())
	{
		return $this->_launch($this->_makeUrl($pGetParams), 'PUT', $pContent);
	}
	
	public function deleteData ($pContent = null, $pGetParams = array())
	{
		return $this->_launch($this->_makeUrl($pGetParams), 'DELETE', $pContent);
	}


	protected function _makeUrl($pParams)
	{
		return $this->_url
		.(strpos($this->_url, '?') ? '' : '?')
		.http_build_query($pParams);
	}

	protected function _launch ($pUrl, $context, $data = null)
	{
	    $client = new SimpleRestClient();
		$client->setOption(CURLOPT_HTTPHEADER, array(
				"Accept: application/vnd.s-money.v".$this->version."+json",
				'Authorization: Bearer '.$this->token,
				"Content-type: application/vnd.s-money.v".$this->version."+json"
		));

		switch ($context) {
			case 'GET':
	   			 $client -> getWebRequest($pUrl);
	   			break;
			case 'POST':
				$client->postWebRequest($pUrl, $data);
				break;
			default: 
				//PUT DELETE et autres custom method
				$client->setOption(CURLOPT_CUSTOMREQUEST, $context);
				$client->postWebRequest($pUrl, $data);
				break;
		}
		$response= $client->getWebResponse();
		if (!isset($response)) return false;
		
		$headers = $client->getInfo();
		$jsonResponse =  json_decode($response, true);

		if ($jsonResponse !== null && $jsonResponse !== false) {

			return array('content' => $jsonResponse, 'headers' => $headers);
		}

		switch($headers['http_code']) {
			case 400:
				$errorMessage = 'Erreur 400: Paramètres invalides';
				break;
			case 404:
				$errorMessage = 'Erreur 404 : Ressource introuvable';
				break;
			default: 
				$errorMessage = 'Erreur '.$headers['http_code'];
				break;	
		}
		return array('content' => array('Code' => $headers['http_code'], 'ErrorMessage' => $errorMessage), 'headers' => $headers);

	}
}