<?php
  $dir = "data/test";
  $result = mkdir($dir);
  if ($result === false) {
    die("Failed to create directory $dir");
  } else {
    echo "Created directory $dir";
  }
?>