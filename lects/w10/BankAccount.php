<?php
class BankAccount {
  private $accountNumber;
  private $customerName;
  private $balance;

  /*
   @balance: optional parameter (default value: 0) 
   */
  function __construct($acNum, $custName, $balance = 0) {
      $this->accountNumber = $acNum;
      $this->balance = $balance;
      $this->customerName = $custName;
  }

  public function setBalance($newValue) {
    $this->balance = $newValue;
  }
  
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
    $serialVars = 
      array('accountNumber', 'balance', 'customerName');
      
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