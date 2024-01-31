<?php
  // requires: current directory = w05
  $file = "data" . DIRECTORY_SEPARATOR. "bowlers.txt";
  echo "Appending to $file" . PHP_EOL;
  $newBowler = "Doe, John ABC" . PHP_EOL;
  $result = file_put_contents($file, $newBowler
    , FILE_APPEND
  );
  if ($result > 0) {
    echo "ok" . PHP_EOL;
  } else {
    die("Failed to append to $file");
  }
?>