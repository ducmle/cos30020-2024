<?php
require_once("BankAccountEnhanced.php");

main();

function main() {
  if (!class_exists("BankAccount")) {
    echo "<p>The BankAccount class is not available!</p>";
  } else {
    $checking = new BankAccount(1, "WAD");
    
    echo "Created: " . $checking->toString();

    try {
      // enhanced: access property directly without set/get
      // old: $checking->setBalance(100);
      $checking->balance = 102;
      // echo "<p>Updated account balance: ". $checking->getBalance() . "</p>";
      echo "<p>Updated account balance: ". $checking->balance . "</p>";

      echo "<p>object class: ".get_class($checking)."</p>";

      echo "instance-of BankAccount: " . ($checking instanceof BankAccount);

      // 
      $cash = 200;
      $checking->withdraw($cash);
      printf("<p>After withdrawing $%.2f, account balance: $%.2f.</p>",
          $cash, $checking->balance);

      // serialisable
      echo "<p>BEFORE serialised: ". $checking->toString() ."</p>";

      $serAct = serialize($checking);
      echo "<p>Serialised: </p>";
      var_dump($serAct);

      // 
      $serActWithNulls = str_replace("\0", "\\0", $serAct);
      echo "<p style='color: blue'>Serialised (with visible Nulls): $serActWithNulls</p>";

      // do something with the serialised string (e.g. store it to a file or pass around in a session)
      // sometime later...
      // deserialise
      $checking2 = unserialize($serAct);
      echo "<p>AFTER deserialised: ". $checking2->toString() ."</p>" . PHP_EOL;
    } catch (RuntimeException $e) {
      die("<br/> {$e->getMessage()}");
    }
  }
}
