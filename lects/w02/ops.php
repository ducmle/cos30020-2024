<?php
  $divisionResult = 15 / 6;
  $modulusResult = 15 % 6;
  echo "<div>15 divided by 6 is $divisionResult.</div>", "<br/>", PHP_EOL; // prints '2.5'
  
  // $times = (int) $divisionResult;

  // echo PHP_EOL,"The whole number 6 goes into 15 $times times, with a
  //   remainder of $modulusResult.</div>", "<br/>"; // prints '3'

  $studentId = 100;
  $currStudentId = ++$studentId;
  echo $studentId, ",", $currStudentId, "<br/>";
  // prints: 101, 101

  $currStudentId = $studentId++;  // studentId = 101 => currStudentId = 101
  echo $studentId, ",", $currStudentId, "<br/>";
  // prints: 102, 101

  // // compound operators
  $x = "20";
  $y = 20;

  // $x += $y; // equivalent to: $x = $x + $y
  // echo $x, "<br/>";
  // $x *= $y;
  // echo $x, "<br/>";
  // $x /= $y;
  // echo $x, "<br/>";
  // $x %= $y;
  // echo $x, "<br/>";

  // // comparison operators
  echo "normal compare: '$x' == '$y'", PHP_EOL;
  if ($x == $y) {
    echo "$x = $y", "<br/>";
  } else {
    echo "$x != $y", "<br/>";
  }

  echo "strict compare: '$x' === '$y'", PHP_EOL;
  $x = "20";
  if ($x === $y) {
    echo "$x === $y", "<br/>";
  } else {
    echo "$x !== $y", "<br/>";
  }

  $bjack = 20;
  $result = ($bjack < 21) ? 
    ($bjack < 10 ? "very short": "looks ok") : 
    "out of the game";
  echo $result, PHP_EOL;

  // if ($bjack < 21) {
  //   $result = "still in the game";
  // } else {
  //   $result = "out of the game";
  // }

  // casting 
  $speedLimitMiles = "57";  // error: "57 miles"
  // ok
  $speedLimitKilometers = (int) ($speedLimitMiles * 1.6);

  echo PHP_EOL, "$speedLimitMiles miles is equal to $speedLimitKilometers kph", PHP_EOL;

  echo gettype($speedLimitMiles), PHP_EOL;
  echo gettype($speedLimitKilometers), PHP_EOL;

  // use brackets for complex expressions
  define("PI", 3.14);
  //$radius = 10;
  $dia = 10;
  $areaCircle = PI * (($dia - 20) / 2) * ($dia / 2); 

  echo "circle($dia) has area: $areaCircle", PHP_EOL;
?>