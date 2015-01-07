<?php

class OperationStep
{
	public $Step;
	
	public function __construct()
	{
		$this->Step=0;
	}
	
	public function getStep() 		{return $this->Step;}

	public function setStep($Step)	{return ($this->Step=$Step);}
	
	public function getAttributes()
	{
		$list = array ('Step' 	=> $this->Step);
		return $list;
	}
	
  	public function encodeJSON()
  	{
  	    $json = new StdClass();
  		foreach ($this as $key => $value){
  			$lowerKey = strtolower($key);
  			$json->$lowerKey = $value;
  		}
  		return json_encode($json);
  	}
  	
  	public function init($Step  )
  	{
  		$this->Step	=$Step;

  	}
  	
  	public function initObject($array)
  	{
  		$this->Step	=$array["Step"];
  	}
}
