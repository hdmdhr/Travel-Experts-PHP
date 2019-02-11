<?php
/**************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: include three classes, Person, Agent, Customer.
*
**************************/


/*---- Test area ----

$test = new Agent('DongMing','Hu','780616-7477','1@2.com','Boss',2,'ASM');
echo $test;

----------------------*/

  class Agent extends Person {
    // Note: for the generic insert object into database function to work, have to change the property visibility from protected to public
    public $midNameInit;
    public $postion;
    public $agencyId;
    // static properties are for database insertion
    public static $fields = array('AgtMiddleInitial','AgtPosition','AgencyId','AgentId','AgtFirstName','AgtLastName','AgtBusPhone','AgtEmail');
    public static $fieldsType = 'ssiissss';

    function __construct($fn,$ln,$bp,$e,$po,$ai,$mi=NULL) {
      parent::__construct($fn,$ln,$bp,$e);
      $this->midNameInit = $mi;
      $this->postion = $po;
      $this->agencyId = $ai;
    }

    function getMidName(){
      return $this->$midNameInit;
    }
    function setMidName($newValue){
      $this->$midNameInit = $newValue;
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
      $propertiesArray = get_object_vars($this);  // will not get static property
      $str = implode(', ',$propertiesArray);
      return $str;
    }
  }

  class person {
    public $id;   // this id property will only be assigned by database, it never gets constructed
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

    public function getId() {
      return $this->id;
    }
    public function setId($id) {
      $this->id = $id;
    }

    public function getFirstName() {
      return $this->firstName;
    }
    public function setFirstName($fname) {
      $this->firstName = $fname;
    }

    public function getLasttName() {
      return $this->lastName;
    }
    public function setLastName($lname) {
      $this->lastName = $lname;
    }

    public function getBusPhone() {
      return $this->busPhone;
    }
    public function setBusPhone($bphone) {
      $this->busPhone = $bphone;
    }

    public function getEmail() {
      return $this->email;
    }
    public function setEmail($email) {
      $this->email = $email;
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
    public static $fields = array('CustAddress','CustCity','CustProv','CustPostal','CustCountry','CustHomePhone','AgentId','CustomerId','CustFirstName','CustLastName','CustBusPhone','CustEmail');
    public static $fieldsType = 'ssssssiissss';


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
