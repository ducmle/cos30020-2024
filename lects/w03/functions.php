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

 /*
  @requires $numbers is an array of numbers
  @effects return the arithmetic average of the elements in $numbers
  */
  function average($numbers) {
    $result = 0;
    for($x = 0; $x < count($numbers); $x++) {
      $result += $numbers[$x];
    }

    return $result / count($numbers);
  }

  $numbers = array(69,420,7000,1,2);
  $avg = average($numbers);
  $numbersAsStr = print_r($numbers, true);
  echo "<p>the average of $numbersAsStr is: $avg</p>";
?>