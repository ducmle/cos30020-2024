<?php
require_once('../../util/mysqlToolkitObj.php');

/* 
 Requires: user/password has been added to database and granted suitable 
 privileges on it
 On phpmyadmin:
 - select database mysql, open SQL tab
 - create user admin identified by 'password';
 - grant all privileges on test.* to 'admin'@'localhost' identified by 'password';
 - flush privileges;
*/
mysqlConnect();
// mysqlConnectFull();
