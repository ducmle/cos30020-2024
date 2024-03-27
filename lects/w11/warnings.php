<?php
require_once("settings.php");
setErrorReporting(E_WARNING, true);

warning1();
warning2();

function warning1()
{
  $file = "test.txt";
  $content = file_get_contents($file);

  echo "File content: " . PHP_EOL;
  print_r($content);
}

function warning2()
{
  $firstName = "Don";
  $lastName = "Gosselin";
  echo "<p>Hello, my name is $firstName $last.</p>";
}
