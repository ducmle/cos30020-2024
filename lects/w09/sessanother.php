<?php
session_start();

if (session_status() === PHP_SESSION_NONE) {
  // no session
  header("location: sessionerror.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Using session</title>
</head>
<body>
  <h1>Using session</h1>
  <?php
    // can also be viewed on the server file whose path is set in session.save_path (configured in $XAMPP/etc/php.ini)
    // for XAMPP: path is the temp folder $XAMPP/temp
    foreach ($_SESSION as $key => $val) {
      echo "<p>$key: $val</p>";
    }
  ?>
  <p><a href='sessions.php'>Home</a></p>

</body>
</html>