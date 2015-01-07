<?php

class MoneyOutQuote
{
    protected $AccountId;
    protected $BankAccount;
    protected $Amount;
    protected $Fee;
    protected $OperationDate;
    
    public function __construct()
    {
        $this->AccountId     = new AccountRef();
        $this->BankAccount   = new BankAccount();
        $this->Amount        = 0;
        $this->Fee           = new Fee();
        $this->OperationDate = date(DateTime::ATOM);
    }
    
    public function getAccountId()          {return $this->AccountId;}
    public function getBankAccount()        {return $this->BankAccount;}
    public function getAmount()             {return $this->Amount;}
    public function getFee()                {return $this->Fee;}
    public function getOperationDate()      {return $this->OperationDate;}
    
    public function setAccountId        ($AccountId)    { return ($this->AccountId=$AccountId); }
    public function setBankAccount      ($BankAccount)  { return ($this->BankAccount=$BankAccount); }
    public function setAmount           ($Amount)       { return ($this->Amount=$Amount); }
    public function setFee              ($Fee)          { return ($this->Fee=$Fee); }
    public function setOperationDate  ($OperationDate){ return ($this->OperationDate=$OperationDate); }
   
    public function getAttributes ()
    {
        $list = array ( 
          'AccountId'       => $this->AccountId, 
          'BankBankAccount' => $this->BankAccount, 
          'Amount'          => $this->Amount, 
          'Fee'             => $this->Fee,
          'OperationDate'   => $this->OperationDate
        );
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

    
    public function init($AccountId, $BankAccount, $Amount, $Fee, $OperationDate )
    {
        
        $accountRef = new AccountRef();
        $accountRef->initObject($array["AccountId"]);

        $this->BankAccount   =$BankAccount;
        $this->Amount        =$Amount;
        $this->Fee           =$Fee;
        $this->OperationDate =$OperationDate;
    }
    
    public function initObject($array)
    {
        $accountRef = new AccountRef();
        $accountRef->initObject($array["AccountId"]);
        
        $this->AccountId        =$accountRef;
        
        $bank = new BankAccount();
        $bank->initObject($array["BankAccount"]);
        $this->BankAccount = $bank;
        
        $this->Amount = $array["Amount"];
        
        /*********/
        $fee = new Fee();
        $fee->initObject($array["Fee"]);
        $this->Fee = $fee;
        
        if(isset($array["OperationDate"])) {
            $this->OperationDate  = date(DateTime::ATOM, strtotime($array["OperationDate"]));
        }
    
    }
}