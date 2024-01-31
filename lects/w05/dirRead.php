<?php
// Uses "\\" for Windows  Path
$dir = implode(DIRECTORY_SEPARATOR, array($_SERVER["DOCUMENT_ROOT"], "dev", "www", "w05", "data")); 

echo "Listing directory: $dir", "<br/>";

readDir1($dir);
echo "<br/>Sorted:<br/>";
readDir2($dir);

function readDir2($dir) {
  $dirEntries = scandir($dir);
  
  //sort($dirEntries);

  foreach ($dirEntries as $currEntry) {
    echo $currEntry , (is_dir($currEntry) ? " ==&gt; &lt;dir&gt;" : ""), "<br />";
  }
}

function readDir1($dir) {
  $dirOpen = opendir($dir);
  while ($currEntry = readdir($dirOpen)) {
    echo $currEntry , "<br />";
  }
  closedir($dirOpen);
}
?>