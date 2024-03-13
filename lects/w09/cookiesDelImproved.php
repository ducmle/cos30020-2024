<?php
// Improvement: get cookie config from file (shared with other scripts)
include_once("cookieFunc.php");

$idCookie = "id";
$nameCookie = "names";
if (isset($_COOKIE[$idCookie])) {  // ookie first time
  // value ONLY available on next PAGE RELOAD
  $cookieCfg = getCookieConfig();
  $expireDel = time() - $cookieCfg["expireInterval"];
  $path = $cookieCfg["path"]; 
  $domain = $cookieCfg["domain"];
  $secure = $cookieCfg["secure"];
  setcookie($idCookie, "", $expireDel, $path, $domain, $secure);
  setcookie("names[0]", "" , $expireDel, $path, $domain, $secure);
  setcookie("names[1]", "" , $expireDel, $path, $domain, $secure);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deleting cookie</title>
</head>
<body>
  <h1>Deleting cookies...</h1>
  <?php 
    // retrieve cookie to check
    $id = $_COOKIE[$idCookie];
    if (isset($id)) {
      echo "<p style=\"color: green\">Id: {$id}<br/>";
    } else {
      echo "<p style=\"color: red\">Id cookies: deleted<br/>";
    }

    $names = $_COOKIE["names"];
    if (isset($names)) {
      echo "<p style=\"color: green\">Names still there!<br/>";
    } else {
      echo "<p style=\"color: red\">Names cookies: deleted<br/>";
    }
  ?>
  <p></p>
  <a href="cookiesDelImproved.php">Another request</a>
</body>
</html>