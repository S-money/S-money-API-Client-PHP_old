<?php

class AccountRef
{
	public $id;
	public $appaccountid;
	public $displayname;
	public $href;
	
	public function __construct()
	{
		$this->id= null;
		$this->appaccountid="";
		$this->displayname="";
		$this->href = "";
	}
	
	public function getId() 			{return $this->id;}
	public function getAppAccountId() 	{return $this->appaccountid;}
	public function getDisplayName()	{return $this->displayname;}
	public function getHref()			{return $this->href;}
	
	
	public function setId 			($Id) 			{ return ($this->id=$Id); }
	public function setAppAccountId ($AppAccountId) { return ($this->appaccountid=$AppAccountId); }
	public function setDisplayName  ($DisplayName) 	{ return ($this->displayname=$DisplayName); }
	public function setHref 		($Href) 		{ return ($this->href=$Href); }
   
	
	public function getAttributes ()
  {
		$list = array(
      'id'           => $this->id, 
      'appaccountid' => $this->appaccountid, 
      'displayname'  => $this->displayname, 
      'href'         => $this->href);
	    return $list;
  	}
  	
  	
    public function encodeJSON()
    {
      $json = new StdClass();
      foreach ($this as $key => $value){
        if(is_null($value)) continue;
        $lowerKey = strtolower($key);
        $json->$lowerKey = $value;
      }
      return json_encode($json);
    }
  	
  	
  	public function init($Id, $AppAccountId, $DisplayName, $Href)
  	{
  		$this->id=$Id;
  		$this->appaccountid=$AppAccountId;
  		$this->displayname=$DisplayName;
  		$this->href=$Href;
  	}
  	
  	
  	public function initObject($array)
  	{
      if(isset($array['Id']))
  		  $this->id=$array["Id"];

  		$this->appaccountid=$array["AppAccountId"];
  		$this->displayname=$array["DisplayName"];
  		$this->href=$array["Href"];
  	}
  	
  	
}
