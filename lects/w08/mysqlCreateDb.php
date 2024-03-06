<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
if (!isset($_POST["db"]) || empty($_POST["db"])) {
  // displays the db login form
  echo dbLoginForm();
} else {
  //  1. connect to database and keep the connection object in a variable
  $host = "localhost";
  $user = $_POST["user"];
  $pwd = $_POST["pwd"];
  $db = $_POST["db"];
  $dbConnect = createMySQLConnect($host, $user, $pwd);

  if ($dbConnect === false) {
    // echo "<p>Failed to connect to database: $db</p>";
    echo handleConnError($host);
  } else {
    // 2. manipulate data in the database
    $result = createDatabase($dbConnect, $db);
    if ($result === false) {
      echo "<p>Failed to create database: $db</p>";
      // echo handleConnError($host);
    } else {
      echo "<p>Successfully created database: $db</p>";
    }

    // 3. close the connection
    mysqli_close($dbConnect);
  }
}

function dbLoginForm() {
  return <<<BLK
   <form method="POST">
    <div>User:</div><input type="text" name="user"/>
    <div>Password:</div><input type="password" name="pwd"/>
    <div>Database:</div><input type="text" name="db"/>
    <p><input type="submit" value="Submit"/></p>
   </form>
  BLK;
}

?>

</body>
</html>