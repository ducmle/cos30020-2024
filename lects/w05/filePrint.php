<?php
  // requires current working directory = w05
  $file = "data" . DIRECTORY_SEPARATOR . "bowlers.txt";

  $result = readfile($file);  // code debugging
  if ($result === false) {
    die("Failed to printing $file to standard output");
  }
?>