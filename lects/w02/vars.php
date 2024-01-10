<?php
  // invalid var name
  // Camel-case naming convention for identifiers
  $thisVarIsValid = 1;

  $var = 1;
  $Var = 2;
  println('$var = '.$var) ;
  println('$Var = '.$Var) ;

  // constants
  define("PI", 3.14);
  println(PI);

  $constName = "PI";
  println(constant($constName));

  // // var -> constant
  $var = PI;
  println('$var = '. $var);

  // // undefined variable
  // // $var = $PI_INVALID;

  // // boolean 
  // $bvar = true;
  // echo '$bvar = ', $bvar, PHP_EOL;

  // println
  function println($var) {
    echo $var, PHP_EOL;
  }
?>