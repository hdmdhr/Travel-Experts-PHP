<?php
/**************************
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
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
    public $agtUserName;
    public $agtPassword;
    public $agencyId;
    // static properties are for database insertion
    public static $fields = array('AgtMiddleInitial','AgtPosition','AgtUserName','AgtPassword','AgencyId','AgentId','AgtFirstName','AgtLastName','AgtBusPhone','AgtEmail');
    public static $fieldsType = 'ssssiissss';

    function __construct($fn,$ln,$bp,$e,$po,$ai,$au,$ap,$mi=NULL) {  // __construct arguments order should match the form
      parent::__construct($fn,$ln,$bp,$e);
      $this->midNameInit = $mi;
      $this->postion = $po;
      $this->agtUserName = $au;
      $this->agtPassword = $ap;
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
   */
  class Customer extends Person {
    public $address;
    public $city;
    public $prov;
    public $postal;
    public $country;
    public $homePhone;
    public $custUserName;
    public $custPassword;
    public $agentId;
    public static $fields = array('CustAddress','CustCity','CustProv','CustPostal','CustCountry','CustHomePhone','CustUserName','CustPassword','AgentId','CustomerId','CustFirstName','CustLastName','CustBusPhone','CustEmail');
    public static $fieldsType = 'ssssssssiissss';


    function __construct($fName,$lName,$email,$homeP,$busP,$add,$city,$prov,$post,$cUsername,$cPin,$country='Canada',$agtId=NULL) {  // __construct arguments order should match the html form
      parent::__construct($fName,$lName,$busP,$email);
      $this->address = $add;
      $this->city = $city;
      $this->prov = $prov;
      $this->postal = $post;
      $this->country = $country;
      $this->homePhone = $homeP;
      $this->custUserName = $cUsername;
      $this->custPassword = $cPin;
      $this->agentId = $agtId;
    }
  }
////////////Liming////////////////
  class Package {
    protected $id;
		protected $PkName;
		protected $PkStartDate;
		protected $PkEndDate;
		protected $PkDesc;
		protected $PkBasePrice;

		public function __construct($id,$PN, $PSD, $PED, $PD,$PBP){
      $this->id = $id;
      $this->PkName = $PN;
			$this->PkStartDate = $PSD;
			$this->PkEndDate = $PED;
			$this->PkDesc = $PD;
			$this->PkBasePrice = $PBP;
		}

    function calculateTimePeriod(){
      // return the subtraction between start date and end date
    }

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
    }

		public function setPkName($PN) {
			$this->PkName = $PN;
		}

		public function getPkName() {
			return $this->PkName;
		}

		public function setPkStartDate($PSD) {
			$this->PkStartDate = $PSD;
		}

		public function getPkStartDate() {
			return $this->PkStartDate;
		}

		public function setPkEndDate($PED) {
			$this->PkEndDate = $PED;
		}

		public function getPkEndDate() {
			return $this->PkEndDate;
		}

		public function setPkDesc($PD) {
			$this->PkDesc = $PD;
		}

		public function getPkDesc() {
			return $this->PkDesc;
    }
    public function setPkBasePrice($PBP) {
			$this->PkBasePrice = $PBP;
		}

		public function getPkBasePrice() {
			return $this->PkBasePrice;
		}
	}
////////////Liming////////////////
  /**
   *
   */
  class CreditCard {
    protected $cardId;
    protected $cardName;
    protected $cardNumber;
    protected $expireDate;
    protected $custId;

    function __construct($cName,$cNum,$ex,$custId) {
      $this->cardName = $cName;
      $this->cardNumber = $cNum;
      $this->expireDate = $ex;
      $this->custId = $custId;
    }
  }


 ?>
