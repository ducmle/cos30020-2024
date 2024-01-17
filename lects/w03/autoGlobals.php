<?php
// Usage: ONLY executes this script on the web server!
// GET request: add URL parameters
// POST request: use an HTML form with action=POST
//    OR use PostMan (create a POST request, set the body's form-data to include the parameters as key-value pairs)
echo "This script was executed with the following server software: <br/>",
  $_SERVER["SERVER_SOFTWARE"], ".<br>";
echo "This script was executed with the following server protocol: <br/>",
  $_SERVER["SERVER_PROTOCOL"], ".<br>";
echo '$_GET["name"] = ', $_GET["name"], "<br/>";
echo '$_GET["address"] = ', $_GET["address"], "<br/>";
echo '$_POST["name"] = ', $_POST["name"], "<br/>";
echo '$_POST["address"] = ', $_POST["address"], "<br/>";
?>