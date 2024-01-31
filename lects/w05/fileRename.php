<?php
$file = "data" . DIRECTORY_SEPARATOR . "sfweather.txt";
$targetFile = "data" . DIRECTORY_SEPARATOR . "sfweather-renamed.txt";  // same directory
if (file_exists($file)) {
  if (rename(
    $file,
    $targetFile
  )) {
    echo "<p>File '$file' renamed to '$targetFile'.</p>";
  } else {
    echo "<p>Unable to rename file: $file!</p>";
  }
} else {
  echo ("<p>File '$file' does not exist!</p>");
}