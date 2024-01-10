<?php
  function element(string $name, $value=null) {
    if ($value == null) {
      // self-closing tag
      echo "<$name/>";
    } else{
      // normal tag
      echo "<$name>$value</$name>";
    }
  }
?>