<?php
if1();
if2();
if3();

function if1() {
  $exampleVar = 5;
  if ($exampleVar == 5) { // CONDITION EVALUATES TO 'TRUE'
    echo "<div>The condition evaluates to true.</div>";
    echo '<div>$exampleVar is equal to ', "$exampleVar.</div>";
    echo "<div>Each of these lines will be printed.</div>";
  }
  echo "<div>This statement always executes after if.</div>";
}

function if2() {
  // todo: how to get the current date/day?
  $today = 
    date("l"); //"Thursday";
    // getdate()["weekday"]
    ;

  if ($today == "Monday") {
    echo "<div>Today is Monday</div>";
  } else {
    echo "<div>Today is $today, not Monday</div>";
  }
}

function if3() {
  // Usage: ONLY executes this script on the web server!
  // todo: how to test this function?
  if ($_GET["SalesTotal"] > 50) {
    if ($_GET["SalesTotal"] < 100) {
      echo "<div>The sales total is between 50 and 100.</div>";
    } else {
      echo "<div>sales total is >= 100.</div>";
    }
  } else {
    echo "<div>sales total is <= 50.</div>";
  }
}
?>