<?php

class MoneyOutHistory extends HistoryItem
{
	public $AccountLabel;
	
	public function __construct()
	{
    parent::__construct();
		$this->AccountLabel="";
	}
	
	public function getAccountLabel() {return $this->AccountLabel;}
	public function setAccountLabel($AccountLabel) 	{ return ($this->AccountLabel=$AccountLabel); }	

	public function getLabel()
	{
		return $this->getAccountLabel();
	}

	public function setLabel($label)
	{
		parent::setLabel($label);
		return ($this->AccountLabel = $label); 
	}

	public function getAttributes ()
	{
		$list = array ('AccountLabel' => $this->AccountLabel);
		return $list;
	}
	
  	 	
	public function initObject($array)
	{
    parent::initObject($array);
		
    $this->AccountLabel	=$array["AccountLabel"];
	}
}
