<?php

class RefundHistory extends HistoryItem
{
	public $RefundedOperation;
	
	public function __construct()
	{
		$this->RefundedOperation= new HistoryItemRefence();
	}
	
	public function getRefundedOperation() 		{return $this->RefundedOperation;}
	
	
	public function setRefundedOperation 	($RefundedOperation) 	{ return ($this->RefundedOperation=$RefundedOperation); }	
   
	public function getAttributes ()
	{
		$list = array ('RefundedOperation' => $this->RefundedOperation);
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
  	
  	public function init($RefundedOperation)
  	{
  		$this->RefundedOperation	=$RefundedOperation;
	}
  	
  	public function initObject($array)
  	{
  		$this->RefundedOperation	=$array["RefundedOperation"];
  	}
}

