<?php
  $file = "data" . DIRECTORY_SEPARATOR . "bowlers.txt";

  $fileContent = file($file);
  for ($i=0; $i < count($fileContent); $i++) {
    $entry = $fileContent[$i];
    $entryArr = explode(", ", $entry);
    echo "<div><strong>" . ($i + 1)
    . ". </strong>";
    echo "{$entryArr[0]}, {$entryArr[1]}<br />";
  }
?>