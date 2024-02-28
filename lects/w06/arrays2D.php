<?php
// Two implementations of the 2-dimensional exchange rate array in the lecture

// version 1: this is the one given on the slides, but does not use the currency name as key
echo "<h2>Version 1: indexedArr2D</h2>";
indexedArr2D();

// version 2 (preferred): enhanced of the one given on the slide, uses the currency name as key (to ease lookup and search)
echo "<h2>Version 2: assocArr2D</h2>";
assocArr2D();

// 
function indexedArr2D() {
  $usDollars = array(1, 104.61, 0.7476, 0.5198, 1.2013, 1.1573);
  $yen = array(0.009559, 1, 0.007146, 0.004969, 0.011484, 0.011063);
  $euro = array(1.3377, 139.9368, 1, 0.6953, 1.6070, 1.5481);
  $ukPound = array(1.9239, 201.2592, 1.4382, 1, 2.3112, 2.2265);
  $canadianDollar = array(0.8324, 87.0807, 0.6223, 0.4327, 1, 0.9634);
  $swissFranc = array(0.8641, 90.3914, 0.6459, 0.4491, 1.0380, 1);

  // 2-dimensional array: mapping out the exchange rates of currencies
  $exchangeRates = array($usDollars, $yen, $euro, $ukPound,
    $canadianDollar, $swissFranc);

  // print_r($exchangeRates);

  // get a specific element
  $k1 = 0;
  $k2 = 1;
  echo '<p>', '$exchangeRates['.$k1.']['.$k2.']: ', $exchangeRates[$k1][$k2], "</p>";

  // print each element
  foreach ($exchangeRates as $rate) {
    $len = count($rate);
    // foreach ($rate as $r) {
    //   echo $r, ",";
    // }
    for ($i = 0; $i < $len; $i++) {
      echo $rate[$i], $i < $len-1 ? "," : "";
    }
    echo "<br/>";
  }
}

function assocArr2D() {
  $keys = array("U.S. $", "Yen", "Euro", "U.K. Pound", "Canadian $", "Swiss Franc");
  $exchangeRates = array(
    $keys[0] => array(
      $keys[0] => 1, 
      $keys[1] => 104.61, 
      $keys[2] => 0.7476, 
      $keys[3] => 0.5198, 
      $keys[4] => 1.2013, 
      $keys[5] => 1.1573), // U.S. $
    $keys[1] => array(
      $keys[0] => 0.009559, 
      $keys[1] => 1, 
      $keys[2] => 0.007146, 
      $keys[3] => 0.004969, 
      $keys[4] => 0.011484, 
      $keys[5] => 0.011063), // Yen
    $keys[2] => array(
      $keys[0] => 1.3377, 
      $keys[1] => 139.9368, 
      $keys[2] => 1, 
      $keys[3] => 0.6953, 
      $keys[4] => 1.6070, 
      $keys[5] => 1.5481), // Euro
    $keys[3] => array(
      $keys[0] => 1.9239, 
      $keys[1] => 201.2592, 
      $keys[2] => 1.4382, 
      $keys[3] => 1, 
      $keys[4] => 2.3112, 
      $keys[5] => 2.2265), // U.K. Pound
    $keys[4] => array(
      $keys[0] => 0.8324, 
      $keys[1] => 87.0807, 
      $keys[2] => 0.6223, 
      $keys[3] => 0.4327, 
      $keys[4] => 1, 
      $keys[5] => 0.9634), // Canadian $
    $keys[5] => array(
      $keys[0] => 0.8641, 
      $keys[1] => 90.3914, 
      $keys[2] => 0.6459, 
      $keys[3] => 0.4491, 
      $keys[4] => 1.0380, 
      $keys[5] => 1) // Swiss Franc
  );

  //print_r($exchangeRates);

  // get a specific element
  $k1 = $keys[0]; // US $
  $k2 = $keys[1]; // Yen
  echo '<p>', '$exchangeRates['.$k1.']['.$k2.']: ', $exchangeRates[$k1][$k2], "</p>";

  // print each element
  foreach ($exchangeRates as $k => $rate) {
    echo "<p> $k => <br/> ";
    foreach ($rate as $key => $val) {
      echo $key, "=>" , $val, " ";
    }
    // do {
    //   $key = key($rate);
    //   $val = current($rate);
    //   echo $key, "=>" , $val, " ";
    // } while (next($rate));
    echo "</p>";
  }

}
?>