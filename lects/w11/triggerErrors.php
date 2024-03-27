<?php
// require_once("settings.php");
// setErrorReporting(E_WARNING | E_USER_NOTICE | E_ERROR);
// setErrorReporting(E_WARNING, true);

if (isset($_GET["height"]) && isset($_GET["weight"])) {
  if (
    !is_numeric($_GET["weight"])
    || !is_numeric($_GET["height"])
  ) {
    trigger_error("User did not enter numeric values", E_USER_ERROR);
    exit();
  }
} else {
  trigger_error("User did not enter values", E_USER_NOTICE);
}

$bodyMass = $_GET["weight"] / ($_GET["height"]
  * $_GET["height"]) * 703;
printf("<p>Your body mass index is %d.</p>", $bodyMass);