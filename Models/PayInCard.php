<?php

class PayInCard extends PayIn
{
  public $orderId;
  public $urlReturn;
  public $href;
  public $availableCards;
  public $ismine = true;
  
  public function __construct()
  {
    parent::__construct();
    $this->orderId   = "";
    $this->urlReturn = "";
    $this->href      = "";
    $this->availableCards     = "";
    $this->ismine    = true;
    $this->errorCode = null;
    $this->extraResults =null;
  }
  
  public function getOrderId()      {return$this->orderId;}
  public function getUrlReturn()      {return $this->urlReturn;}
  public function getHref()       {return $this->href;}
  public function getCards()       {return $this->availableCards;}
  public function getErrorCode()  {return $this->errorCode;}
  public function getExtraResults()  {return $this->extraResults;}
  public function getIsMine()  {return $this->ismine;}

  public function setOrderId ($OrderId) { return ($this->orderId=$OrderId); }
  public function setUrlReturn  ($UrlReturn)  { return ($this->urlReturn=$UrlReturn); }
  public function setHref     ($href)     { return ($this->href=$href); }
  public function setErrorCode     ($ErrorCode)     { return ($this->errorCode=$ErrorCode); }
  public function setExtraResults($extraResults)  {return ($this->extraResults = $extraResults);}
  public function setIsMine($isMine)  {return ($this->ismine = $isMine);}

  public function setCards($cards)
  {
    return ($this->availableCards=$cards);
  }

  public function getAttributes ()
  {
    $list = array (
      'orderId'   => $this->orderId,
      'urlReturn' => $this->urlReturn,
      'href'      => $this->href,
      'cards'     => $this->availableCards
    );
    return $list;
  }
  
  public function encodeJSON()
  {
      $json = new StdClass();
      foreach ($this as $key => $value){

        $lowerKey = strtolower($key);
        if (is_object($this->$key) && method_exists($this->$key, 'encodeJson')) {
          $value = json_decode($this->$key->encodeJson());
        } 

        if (!empty($value)) {
          $json->$key = $value;
        }
      }

      return json_encode($json);
    }

  public function initObject($array)
  {

    parent::initObject($array);
    
    $this->amount  = $array["Amount"];
    $this->message = $array["Message"];
    if (isset($array['IsMine'])) {
      $this->setIsMine($array['IsMine']);
    }
    
    $this->setOrderId($array["OrderId"]);

    if (isset($array["Href"])) {
      $this->setHref($array["Href"]);
    }

    if (isset($array["UrlReturn"])) {      
      $this->urlReturn =$array["UrlReturn"];
    }

    $this->setErrorCode($array['ErrorCode']);
    

    if (isset($array['ExtraResults'])) {
      $ExtraResults = new SPExtraResultCodes();
      $ExtraResults->initObject($array['ExtraResults']);
      $this->setExtraResults($ExtraResults);
    }
  }
}