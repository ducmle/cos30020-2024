<?php
$dirName = "data";
$cwd = getcwd();
$dir = $cwd . DIRECTORY_SEPARATOR. $dirName;

if (is_dir($dir)) {
  echo "<h2>Directory: $dir</h2>"; // Windows: \, Linux: /
  echo "<table border='1' width='100%'>";
  echo <<<BLOCK
<tr>
<th scope='col'>Name</th>
<th scope='col'>Size</th>
<th scope='col'>Type</th></tr>
BLOCK;
  $dirEntries = scandir($dir);
  foreach ($dirEntries as $entry) {
    echo "<tr><td>$entry</td><td>",
          filesize($dir . DIRECTORY_SEPARATOR . $entry),
          "</td><td>",
          filetype($dir . DIRECTORY_SEPARATOR . $entry),
          "</td></tr>";
  }
  echo "</table>";
} else {
  echo "<p>The directory does not exist: $dir</p>" . PHP_EOL;
}
