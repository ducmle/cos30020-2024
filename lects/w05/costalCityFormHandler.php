<?php
if (isset($_GET["firstName"]) && isset($_GET["lastName"])) {
  $bowlerFirst = addslashes($_GET["firstName"]);
  $bowlerLast = addslashes($_GET["lastName"]);
  $newBowler = $bowlerLast . ", " . "$bowlerFirst" . PHP_EOL;
  $bowlersFile = "data" . DIRECTORY_SEPARATOR . "bowlers.txt";
  if (file_put_contents($bowlersFile, $newBowler, FILE_APPEND) > 0)
    echo "<p>". stripSlashes($bowlerFirst) . " ", stripSlashes($bowlerLast) . "
    has been registered for the bowling tournament!</p>";
  else
    echo "<p>Registration error!</p>";
} else {
  echo "<p>To sign up for the bowling tournament, enter your
  first and last name and click the Register
  button.</p>";
}
