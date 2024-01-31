<?php

$file = "data" . DIRECTORY_SEPARATOR . "file1";
if (file_exists($file)) {
  if (unlink($file)) {
    echo "<p>File '$file' deleted successfully.</p>";
  } else {
    echo "<p>Unable to delete file: $file!</p>";
  }
} else {
  echo ("<p>File '$file' does not exist!</p>");
}
