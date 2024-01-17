<?php
function testScope() {
  // global makes explicit reference to a global variable
  global $globalVariable;
  echo "<div>$globalVariable</div>";
}
// in PHP, global vars are not available by default in user-defined functions
// Exception: only superglobals ($_POST, $_GET, $GLOBALS, etc.) are available in any variable scope

$globalVariable = "Global variable";

testScope();
?>