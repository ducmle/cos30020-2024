<?php
  $file = "data" . DIRECTORY_SEPARATOR . "bowlers.txt";

  $handle = fopen($file, "r");
  if ($handle === false) {
    die("Failed to open $file for writing");
  }

  $index = 1;
  while (!feof($handle)) {
    $entry = fgets($handle);
    if (strlen(trim($entry)) === 0) {
      continue; // skip empty line
    }
    $entryArr = explode(", ", $entry);
    echo "<div><strong>" . ($index++)
    . ". </strong>";
    echo "Last name: {$entryArr[0]}, First name: {$entryArr[1]}<br />";
  }

  fclose($handle);
?>