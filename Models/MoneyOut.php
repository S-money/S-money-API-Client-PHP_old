<?php

class MoneyOut extends MoneyOutQuote
{
	public $Id = null;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getId() 		{return $this->Id;}
	public function setId ($Id) 	{return ($this->Id=$Id);}
	
	public function getAttributes()
	{
		$list = array ('Id' => $this->Id);
		return $list;
	}
	
}
