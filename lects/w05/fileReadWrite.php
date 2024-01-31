<?php
  $january = "48, 42, 68\n";
  $january .= "48, 42, 69\n";
  $january .= "49, 42, 69\n";
  $january .= "49, 42, 61\n";
  $january .= "49, 42, 65\n";
  $january .= "49, 42, 62\n";
  $january .= "49, 42, 62\n";

  $file = "w05/data/sfjanaverages.txt";
  $put = file_put_contents($file, $january);
  echo "Saved data to file ($file): $put", "<br/>";

  // NOTE: must add server root path if run on browser!
  $januaryTemps = file($file);
  for ($i=0; $i < count($januaryTemps); $i++) {
    $curDay = explode(", ", $januaryTemps[$i]);
    echo "<div><strong>Day " . ($i + 1)
    . "</strong><br/>";
    echo "High: {$curDay[0]}<br />";
    echo "Low: {$curDay[1]}<br />";
    echo "Mean: {$curDay[2]}</div>";
  }
?>