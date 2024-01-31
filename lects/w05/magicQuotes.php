<?php

  $nickname = addslashes($_GET["nickname"]);
  // write $nickname to database...

  // remove magic quotes before displaying
  $nickname2 = stripslashes($nickname);
  echo " with magic quotes: ", $nickname ,"<br/> without magic quotes: ",  $nickname2;
?>