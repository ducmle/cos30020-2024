<?php
class BankAccount {
  private $accountNumber;
  private $customerName;
  private $balance;

  function __construct($acNum, $custName, $balance = 0) {
      $this->accountNumber = $acNum;
      $this->balance = $balance;
      $this->customerName = $custName;
  }

  /**
   * @version: enhanced
   * general setter method for all properties 
   */
  public function __set($name, $val) {
    switch ($name) {
      case "balance": 
        $this->balance = $val; break;
      case "accountNumber": 
        $this->accountNumber = $val; break;
      case "customerName": 
        $this->customerName = $val; break;
      default:
        //echo "<br/>Error: invalid property: $name";
        throw new RuntimeException("Error: invalid property: $name");
    }
  }

  // public function setBalance($newValue) {
  //   $this->balance = $newValue;
  // }
  
  public function getBalance() {
    return $this->balance;
  }
   
  public function withdraw($amount) {
    $this->balance -= $amount;
  }

  public function toString() {
    return <<<BLK
      BankAccount(accountNumber: {$this->accountNumber}, 
      customerName: {$this->customerName},
      balance: {$this->balance})
    BLK;
  }

  public function __sleep() {
    $serialVars = array('accountNumber', 'balance', 'customerName');
    return $serialVars;
  }

  public function __wakeup() {
    // initialise resources
  }

  function __destroy() {
    $this->accountNumber = 0;
    $this->balance = 0;
    $this->customerName = "";
  }
}