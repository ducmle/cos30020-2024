<?php
  // requires: current directory = w05
  $file = "data" . DIRECTORY_SEPARATOR. "bowlers.txt";
  echo "Writing to $file" . PHP_EOL;
  $bowlersFile = fopen($file, "w");
  if ($bowlersFile === false) {
    die("Failed to open $file for overwriting" . PHP_EOL);
  }
  $newBowler = "Doe, John Smith" . PHP_EOL;
  $result = fwrite($bowlersFile, $newBowler);
  if ($result === false) {
    die("Failed to overwrite to $file");
  }
  fclose($bowlersFile);
?>