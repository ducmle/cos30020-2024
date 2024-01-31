<?php
  // requires: current directory = w05
  $file = "data" . DIRECTORY_SEPARATOR. "bowlers.txt";
  echo "Appending to $file" . PHP_EOL;
  $bowlersFile = fopen($file, "a");
  if ($bowlersFile === false) {
    die("Failed to open $file for appending" . PHP_EOL);
  }
  $newBowler = "Doe, John" . PHP_EOL;
  $result = fwrite($bowlersFile, $newBowler);
  if ($result === false) {
    die("Failed to write to $file");
  }
  fclose($bowlersFile);
?>