<?php
  // requires: current directory = w05
  $file = "data" . DIRECTORY_SEPARATOR. "bowlers.txt";
  echo "Writing to $file" . PHP_EOL;
  // r+: pointer to the first line, overwriting 
  // any existing content of that line
  $bowlersFile = fopen($file, "r+");
  if ($bowlersFile === false) {
    die("Failed to open $file for r+" . PHP_EOL);
  }
  $newBowler = "Doe, John" . PHP_EOL;
  $result = fwrite($bowlersFile, $newBowler);
  if ($result === false) {
    die("Failed to writing to $file");
  }
  fclose($bowlersFile);
?>