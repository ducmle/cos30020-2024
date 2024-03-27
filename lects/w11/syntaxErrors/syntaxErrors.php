<?php
// require_once("../settings.php");
// setErrorReporting(E_PARSE | E_COMPILE_ERROR);

  for ($count = 10; $count >= 0; $count--)
    if ($count == 0){
      echo "<p>We have liftoff!</p>";
    } else {
      echo "<p>Liftoff in $count seconds.</p>";
    }
  }
?>