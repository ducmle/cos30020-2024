<?php
// Improved from dirInfo.php to allow browsing into the subdirectories
//
$dir = $_GET["dir"];

if (!isset($dir)) {
  // root dir
  $dir = "data";
  if (is_dir($dir)) {
    $cwd = getcwd();
    $dirPath = $cwd . DIRECTORY_SEPARATOR . $dir;
    browseDir($dirPath);
  } else {
    echo "<p>The directory does not exist: $dir</p>" . PHP_EOL;
  }
} else {
  browseDir($dir);
}

function browseDir($dir) {
  echo "<h2>Directory: $dir</h2>";
  echo "<table border='1' width='100%'>";
  echo <<<BLOCK
<tr>
<th scope='col'>Name</th>
<th scope='col'>Size</th>
<th scope='col'>Type</th></tr>
BLOCK;
  $dirEntries = scandir($dir);
  foreach ($dirEntries as $entry) {
    $entryText = "";
    $entryPath = $dir .  DIRECTORY_SEPARATOR . $entry;
    if (is_dir($entryPath)) {
      // create an dir link
      $script = $_SERVER["SCRIPT_NAME"]; 
      $entryText = "<a href=\"$script?dir=$entryPath\">$entry</a>";
    } else {
      $entryText = $entry;
    }

    echo "<tr><td>$entryText</td><td>",
          filesize($dir . DIRECTORY_SEPARATOR . $entry),
          "</td><td>",
          filetype($dir . DIRECTORY_SEPARATOR . $entry),
          "</td></tr>";
  }
  echo "</table>";
}