<?php

// case1();
// case2();
case3();

function case1()
{
  for ($count = 10; $count >= 0; $count) {
    if ($count == 0)
      echo "<p>We have liftoff!</p>";
    else
      echo "<p>Liftoff in $count seconds.</p>";
  }
}

function case2() {
  $x = 0;
  $y = 20+30-50;;
  echo $x/$y;
}

function case3() {
  // overlooked logic error (the semicolon at end of for statement)
  for ($count = 1; $count < 6; $count++);
    echo "$count<br />";
}