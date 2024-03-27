<?php

case1();
// case2("");

function case1() {
  // Logical error: what is the error?
  for ($count = 1; $count < 6; $count++);
    echo "<p>$count<p />";
}

function case2($firstName = null) {
  // Logical error: what is the error?
  if (!isset($firstName))
    echo "<p>You must enter your first name!</p>";
    exit();

  echo "<p>Welcome to my Web site, " . $firstName ."!";
}