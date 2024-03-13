<?php
  // initialise session with some state data
  $interval = 60 * 60; // 1h
  session_set_cookie_params($interval);
  session_start();

  if (!isset($_SESSION["firstName"])) {
    $rand = rand(1,100);
    $_SESSION["firstName"] = "Don-" . $rand;
    $_SESSION["lastName"] = "Gosselin-" .  $rand;
    $_SESSION["occupation"] = "writer-" . $rand;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sessions</title>
</head>

<body>
  <h1>Sessions</h1>
  <?php
    if (session_status() === PHP_SESSION_NONE) {
      echo "<p style=\"color:red\">Failed to start session!</p>";
    } else {
      $sessId = session_id();
      echo "<p>Session id: $sessId</p>";
      print_r($_SESSION);
    }
  ?>
  <!-- passing session_id along is NOT necessary! -->
  <!-- <p><a href='sessanother.php?session_id'>Another page</a></p> -->
  <p><a href='sessanother.php'>Using session</a></p>
  <p><a href='sessionend.php'>Log out</a></p>
</body>

</html>