<?php


class KYCDemand
{
	public $Id;
	public $RequestDate;
	public $Status;
	public $VoucherCopies;
	
	public function __construct()
	{
		$this->Id=0;
		$this->RequestDate=date(DateTime::ATOM);
		$this->Status= new UserDemandStatus(UserDemandStatus::$userDemandStatus['Incomplete']);
		$this->VoucherCopies= array();
	}
	
	public function getId() 			{return $this->Id;}
	public function getRequestDate() 	{return $this->RequestDate;}
	public function getStatus()		{return $this->Status;}
	public function getVoucherCopies()	{return $this->VoucherCopies;}
	
	
	public function setId  			($Id)  			{ return ($this->Id=$Id); }
	public function setRequestDate 	($RequestDate) 	{ return ($this->RequestDate=$RequestDate); }
	public function setStatus    	($Status) 	  	{ return ($this->City=$Status); }
	public function setVoucherCopies($VoucherCopies){ return ($this->VoucherCopies=$VoucherCopies); }
   
	public function getAttributes ()
  	{
		$list = array ('Id'  			=> $this->Id, 
				   'RequestDate' 	=> $this->RequestDate, 
				   'Status'  		=> $this->Status, 
				   'VoucherCopies' 	=> $this->VoucherCopies);
		return $list;
  	}
  	
    public function encodeJSON()
    {
      foreach ($this as $key => $value){
        $lowerKey = strtolower($key);
        $json->$lowerKey = $value;
      }
      return json_encode($json);
    }
    
  	
  	public function init($Id, $RequestDate, $Status, $VoucherCopies)
  	{
  		$this->Id=$Id;
  		$this->RequestDate=$RequestDate;
  		$this->Status=$Status;
  		$this->VoucherCopies=$VoucherCopies;
  	}
  	
  	
  	public function initObject($array)
  	{
  		$this->Id				= $array["Id"];
  		
  		$this->RequestDate		= new DateTime($array["RequestDate"]);
  		
  		$this->Status			= new UserDemandStatus($array["Status"]);
  		
  		
  		foreach ($array['VoucherCopies'] as $value)
  		{
  			$fileAtRef = new FileAttachmentRef();
  			$fileAtRef->initObject($value);
  			$arrayResult[] = $fileAtRef;
  		}
  		
  		$this->VoucherCopies	= $arrayResult[];
  	}
  	
}

