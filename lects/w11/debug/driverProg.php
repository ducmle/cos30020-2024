<?php
// Driver program version of the logic contained in triggerErrors.php

// use stub functions to return test values for input variables
$height = getParam("height");
$weight = getParam("weight");

if (isset($height) && isset($weight)) {
  if (
    !is_numeric($weight)
    || !is_numeric($height)
  ) {
    trigger_error(
      "User did not enter numeric values",
      E_USER_ERROR
    );
    exit();
  }
} else {
  trigger_error("User did not enter values", E_USER_ERROR);
}

$bodyMass = $weight / ($height * $weight) * 703;

printf("<p>Your body mass index is %d.</p>", $bodyMass);

// stub function
function getParam($param) {
  // return $_GET[$param];
  // return NULL;
  return 100;
}