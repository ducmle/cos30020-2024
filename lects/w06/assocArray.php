<?php
// associative arrays
// initialisation (1)
$capitals = array(
  "Ontario" => "Toronto",
  "Alberta" => "Edmonton");

echo "initial: ". print_r($capitals, true) ."<br/>";  

// initialisation (2)
$capitals["Nunavut"] = "Iqaluit"; // another element
$capitals[] = "Whitehorse"; // next indexed element
$capitals["Northwest Territories"] = "Yellowknife"; // another element
$capitals[] = "Blackhorse"; // next indexed element
echo "after adding elements: ". print_r($capitals, true) ."<br/>";  

echo "keys: " . print_r(array_keys($capitals), true) . "<br/>";

// preferred loop syntax for associative array
echo "<p>loop(\$capitals) </p>";

loop($capitals);

// similar loop syntax for indexed array
echo "loop2(\$capitals) <br/>";
loop2($capitals);

function loop($arr) {
  echo "<p>";
  foreach ($arr as $key => $val) {
    echo "key: $key; value: $val<br>" . PHP_EOL;
  }
  echo "</p>";
}

function loop2($arr) {
  echo "<p>";
  foreach ($arr as $elementVal) {
    echo "key: ". key($arr). "; value: $elementVal<br>" . PHP_EOL;
    // must do this to advance the key
    next($arr);
  }
  echo "</p>";
}

?>