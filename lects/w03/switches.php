<?php
if (isset($_GET["var"])) {
  $var = $_GET["var"];
} else {
  $var = rand(1,2021);
}
echo "<div>var = $var</div>";

$remainder = array(0, 1);

switch ($var % 2) {
  case 0: // alt: $remainder[0]
    echo "<div>is even</div>";
    break;
  case $remainder[1]:
    echo "<div>is odd</div>";
    break;
  default: // should never happen!
    echo "<div>impossible</div>";
  }

  $fruit = $_GET["fruit"];
  switch ($fruit) {
    case "orange": 
    case "banana":
      echo "<div>price is $5!</div>";
      break;
    case "pineapple":
      echo "<div>price is $10!</div>";
      break;
    default: // should never happen!
      echo "<div>impossible fruit!</div>";
    }  
?>