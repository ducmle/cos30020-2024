<?php 
    session_start();

    $_SESSION = array();

    // remove client-side session-id cookie
    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
    }

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>End session</title>
</head>
<body>
  <h1>Session has ended!</h1>
  <p>Session id: <?= session_id() ?></p>

  <p><a href='sessions.php'>Home</a></p>
</body>
</html>