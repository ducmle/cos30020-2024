<?php
  $file = "data/test/test.txt";
  $exists = file_exists($file);
  if ($exists === false) {
    file_put_contents($file, "test");
    echo("Created file: $file");
  } else {
    echo "File exists: $file";
  }
?>