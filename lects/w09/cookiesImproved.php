<?php
// Improvement: store cookie config to file (shared with other scripts)
include_once("cookieFunc.php");

$idCookie = "id";
$randVal = rand(1,100);
if (!isset($_COOKIE[$idCookie])) {  // initialise cookie first time
  // value ONLY available on next PAGE RELOAD
  $cookieCfg = getCookieConfig();

  $expire = time() + $cookieCfg["expireInterval"];
  $path = $cookieCfg["path"]; 
  $domain = $cookieCfg["domain"];
  $secure = $cookieCfg["secure"];

  setcookie($idCookie, $randVal, $expire, $path, $domain, $secure);
  // array-typed cookie
  $firstName = "duc";
  $lastName = "le";
  setcookie("names[0]", $firstName, $expire, $path, $domain, $secure);
  setcookie("names[1]", $lastName, $expire, $path, $domain, $secure);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Using cookie</title>
</head>
<body>
  <h1>Using cookies...</h1>
  <?php 
    // retrieve cookie to use
    $id = $_COOKIE[$idCookie];
    if (isset($id)) {
      // cookie is enabled!, use and/or update it
      $fname = $_COOKIE["names"][0];
      $lname = $_COOKIE["names"][1];
      echo "<p style=\"color: green\">Id: {$id}<br/>";
      echo "First Name: {$fname}<br/>";
      echo "Last Name: {$lname}</p>";
    }

    echo "<p>Random server-generated value: ${randVal}</p>"
  ?>
  <form method="post">
    <p>
      <input type="submit" value="Send request" />
    </p>
  </form>
</body>
</html>