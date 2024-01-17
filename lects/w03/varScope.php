<?php
  // all functions usually grouped together
  // in one location
  function testScope() {
    $localVariable = "<div>Local variable</div>";
    echo "<div>$localVariable</div>";
    // prints successfully

    // global variable
    global $globalVariable;
    echo "<br/>Global variables: $globalVariable";
  }

  $globalVariable = "Global variable";
  testScope();
  
  echo "<div>$globalVariable</div>";
  // error:
  // echo "<div>$localVariable</div>";

  function counter() {
    $i = 0;
    echo "<p>", $i++, "</p>";
  }

  echo "<p>Print counter</p>";
  counter();  // $i is gone!
  counter();
  counter();
?>