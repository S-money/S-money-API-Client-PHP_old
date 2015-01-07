<?php

class Country
{

	public static $country = array(	
										"None"				=>	0, 
										"France"			=>	1, 
										"Allemagne"			=>	2,
										"Autriche"			=>	3,
										"Belgique"			=>	4,
										"Bulgarie"			=>	5,
										"Chypre"			=>	6,
										"Danemark"			=>	7,
										"Espagne"			=>	8,
										"Estonie"			=>	9,
										"Finlande"			=>	10,
										"Grèce"				=>	11,
										"Hongrie"			=>	12,
										"Irlande"			=>	13,
										"Islande"			=>	14,
										"Italie"			=>	15,
										"Lettonie"			=>	16,
										"Liechtenstein"		=>	17,
										"Lituanie"			=>	18,
										"Luxembourg"		=>	19,
										"Malte"				=>	20,
										"Norvège"			=>	21,
										"PaysBas"			=>	22,
										"Pologne"			=>	23,
										"Portugal"			=>	24,
										"RépubliqueTchèque"	=>	25,
										"Roumanie"			=>	26,
										"RoyaumeUni"		=>	27,
										"Slovaquie"			=>	28,
										"Slovénie"			=>	29,
										"Suède"				=>	30,
										"Other"				=>	31,
										"Suisse"			=>	32,
										"AfriqueDuSud"		=>	33,
										"Australie"			=>	34,
										"Bresil"			=>	35,
										"Canada"			=>	36,
										"CoreeDuSud"		=>	37,
										"EtatsUnis"			=>	38,
										"HongKong"			=>	39,
										"Inde"				=>	40,
										"Japon"				=>	41,
										"Mexique"			=>	42,
										"Singapour"			=>	43);
	
	
	public $Value;

	public function __construct($Value)
	{
		$this->Value=$Value;
	}
	
	public function getValue() 			{return $this->Value;}

	public function setValue ($Value) 	{return ($this->Value=$Value); }
  
	public function getAttributes()
	{
		$list = array ('Value' => $this->Value);
		return $list;
	}
	
	public function encodeJSON()
	{
		foreach ($this as $key => $value)
			$json->$key = $value;
		return json_encode($json);
	}
	
	
	public function init($Id, $AppAccountId, $Amount, $DisplayName, $IsDefault)
	{
		$this->Value=$Value;
	}
	
	
	public function initObject($array)
	{
		$this->Value=$array["Value"];
	}
	
}