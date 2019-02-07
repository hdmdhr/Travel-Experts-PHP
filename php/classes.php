<?php

  class Agent extends Person {
    public $midNameInit;
    public $postion;
    public $agencyId;
    public static $fields = array('AgtMiddleInitial','AgtPosition','AgencyId','AgentId','AgtFirstName','AgtLastName','AgtBusPhone','AgtEmail');
    public static $fieldsType = 'ssiissss';

    function __construct($fn,$ln,$bp,$e,$po,$ai,$mi=NULL) {
      parent::__construct($fn,$ln,$bp,$e);
      $this->midNameInit = $mi;
      $this->postion = $po;
      $this->agencyId = $ai;
    }

    function getPosition(){
      return $this->$postion;
    }

    function setPosition($newValue){
      $this->$postion = $newValue;
    }

    function getAgencyId(){
      return $this->$agentId;
    }

    function setAgencyId($newValue){
      $this->$agentId = $newValue;
    }

    function __toString(){
      $propertiesArray = get_object_vars($this);

      $str = implode(', ',$propertiesArray);
      return $str;
    }
  }

  //---- Test area ----

  $test = new Agent('DongMing','Hu','780616-7477','1@2.com','Boss',2,'ASM');
  print_r(get_object_vars($test));
  echo $test;

  // ------------

  class person {
    public $id;
    public $firstName;
    public $lastName;
    public $busPhone;
    public $email;
    function __construct($firstName,$lastName,$busPhone,$email)
    {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->busPhone = $busPhone;
      $this->email = $email;
    }

    function __toString() {  // Magic funtion
      return $this->firstName." ".$this->lastName;
    }

  }

  /**
   * unused class
   */
  class Customer extends Person {
    public $address;
    public $city;
    public $prov;
    public $postal;
    public $country;
    public $homePhone;
    public $agentId;

    function __construct($fName,$lName,$busP,$email,$add,$city,$prov,$post,$country,$homeP,$agtId) {
      parent::__construct($fName,$lName,$busP,$email);
      $this->address = $add;
      $this->city = $city;
      $this->prov = $prov;
      $this->postal = $post;
      $this->country = $country;
      $this->homePhone = $homeP;
      $this->agentId = $agtId;
    }
  }



 ?>
