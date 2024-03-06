<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySqlConnect</title>
</head>
<body>

<?php
// require_once("./mysqlToolkit.php");
require_once("../util/mysqlToolkit.php");

/* 
 Requires: user/password has been added to database and granted suitable 
 privileges on it
 On phpmyadmin:
 - select database mysql, open SQL tab
 - create user admin identified by 'password';
 - grant all privileges on test.* to 'admin'@'localhost' identified by 'password';
 - flush privileges;
*/

// the correct way to use this script is to call it from a web form with user, password, db fields
if (!isset($_POST["user"]) || empty($_POST["user"])) {
  // displays the db login form
  echo dbLoginForm();
} else {
  mysqlConnect();
  // mysqlConnectFull();  
}

function dbLoginForm() {
  return <<<BLK
   <form method="POST">
    <div>User:</div><input type="text" name="user"/>
    <div>Password:</div><input type="password" name="pwd"/>
    <p><input type="submit" value="Submit"/></p>
   </form>
  BLK;
}

?>

</body>
</html>