<?php
$file = "data" . DIRECTORY_SEPARATOR . "sfweather.txt";
$targetDir = "data";  // same directory
$targetFile = $targetDir . DIRECTORY_SEPARATOR . "sfweather-new-2.txt";
if (file_exists($file)) {
  if (is_dir($targetDir)) {
    if (copy(
      $file, $targetFile
    )) {
      echo "<p>File '$file' copied successfully to $targetFile.</p>";
    } else {
      echo "<p>Unable to copy file: $file!</p>";
    }
  } else {
    echo ("<p>Directory '$targetDir' does not exist!</p>");
  }
} else {
  echo ("<p>File '$file' does not exist!</p>");
}
