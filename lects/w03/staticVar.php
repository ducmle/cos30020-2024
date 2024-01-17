<?php
  function counter_static() {
    static $i = 0;
    echo "<div> ", ++$i ,"</div>";
  }
  
  echo "<div> Print counter static </div>";
  counter_static();
  counter_static();
  counter_static();
?>