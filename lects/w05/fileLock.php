<?php
// requires current working directory = w05
$file = "data" . DIRECTORY_SEPARATOR . "temp.txt";

$fp = fopen($file, "r+");

if ($fp === false) {
  die("Failed to open $file");
}

if (flock($fp, LOCK_EX)) {  // acquire an exclusive lock
  ftruncate($fp, 0);      // truncate file
  fwrite($fp, "Write something here\n");
  fflush($fp);            // flush output before releasing the lock
  flock($fp, LOCK_UN);    // release the lock
} else {
  echo "Couldn't get the lock!";
}

fclose($fp);
