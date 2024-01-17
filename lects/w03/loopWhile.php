<?php
while1();
while2();

function while2() {
  $daysOfWeek = array("Monday","Tuesday","Wednesday",
    "Thursday","Friday", "Saturday", "Sunday");
  $count = 0;
  do {
    echo $daysOfWeek[$count], "<br/>";
    $count++;
  } while ($count < 7);
}

function while1() {
  $num = rand(1,10);
  $count = 1;
  while ($count <= $num) {
    echo "$count<br/>";
    // comment this out to get an endless loop!
    $count++;
  }
  echo "<div>You have printed $num numbers.</div>";
}
?>