<?php

class RegulationHistory extends HistoryItem
{
	public $RegulatedOperation;
	
	public function __construct()
	{
		$this->RegulatedOperation= new HistoryItemRefence();
	}
	
	public function getRegulatedOperation() 		{return $this->RegulatedOperation;}
	
	
	public function setRegulatedOperation 	($RegulatedOperation) 	{ return ($this->RegulatedOperation=$RegulatedOperation); }	
   
	public function getAttributes ()
	{
		$list = array ('RegulatedOperation' => $this->RegulatedOperation);
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
  	
  	
  	public function init($RequestOperation)
  	{
  		$this->RegulatedOperation	=$RegulatedOperation;
	}
  	
  	public function initObject($array)
  	{
  		$this->RegulatedOperation	=$array["RegulatedOperation"];
  	}
  	
}

