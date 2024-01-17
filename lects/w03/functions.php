<?php
  // todo: improve this program to organise the functions to be in the same place

  printCompanyName("Swinburne", "FPT Education", "My Uni");

  // todo: improve this to take an array of company names
  function printCompanyName($company1,
    $company2, $company3) {
    echo "<div>$company1</div>";
    echo "<div>$company2</div>";
    echo "<div>$company3</div>";
  }

  // average numbers
  $avg = averageNumbers(1,6,10);
  echo '$avg', " type: ", gettype($avg), PHP_EOL;
  // var_dump($avg);
  echo "averageNumbers(1,6,10) = ", $avg, "<br/>";

  // todo: improve this to take an array of numbers
  function averageNumbers($a, $b, $c) {
    $sum = $a + $b + $c;
    $result = $sum / 3;
    return $result;
  }

  // some time later in the program...

  $anotherAvg = averageNumbers(100,50,75);
  echo "averageNumbers(100,50,75) = ", $anotherAvg; 
?>