<?php 
$topGolfers = array("Tiger Woods", 
"Vijay Singh", 
"Ernie Els", 
"Phil Mickelson", 
"Retief Goosen", 
"Padraig Harrington",
"David Toms", 
"Sergio Garcia", 
"Adam Scott", 
"Stewart Cink");

echo "initial (\$topGolfers): ". print_r($topGolfers, true) ."<br/>";  

$topFiveGolfers = array_slice($topGolfers, 0, 5);
echo "<p>Top five golfers in the world:<br/>";
for ($i = 0; $i < count($topFiveGolfers); $i++) {
  echo "{$topFiveGolfers[$i]}<br />";
}

sort($topFiveGolfers);
echo "</p><p>Top five golfers in ALPHABETICAL order:<br/>";
for ($i = 0; $i < count($topFiveGolfers); $i++) {
  echo "{$topFiveGolfers[$i]}<br />";
}

rsort($topFiveGolfers);
echo "</p><p>Top five golfers in REVERSE ALPHABETICAL order:<br/>";
for ($i = 0; $i < count($topFiveGolfers); $i++) {
  echo "{$topFiveGolfers[$i]}<br />";
}
echo "</p>";

// sort players by rankings
sortByKey();

function sortByKey() {
  $topFive = array(
    50 => "Tiger Woods", 
    65 => "Vijay Singh", 
    100 => "Ernie Els", 
    70 => "Phil Mickelson", 
    45 => "Retief Goosen", 
  );

  echo "\$topFive (initial): " . print_r($topFive, true) . "<br/>";

  ksort($topFive);  // krsort($topFive)

  echo "\$topFive (after ksort): " . print_r($topFive, true) . "<br/>";

  krsort($topFive);  // krsort($topFive)

  echo "\$topFive (after krsort): " . print_r($topFive, true) . "<br/>";
}
?>