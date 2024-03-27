<?php
// PARSE/syntax errors in script (e.g. syntaxErrors.php) are only 
// shown when either (1) error_reporting is set correctly in php.ini 
// OR (2) at run-time by including the script within another error-free script (e.g. main.php)
require_once("../settings.php");
setErrorReporting(E_PARSE | E_COMPILE_ERROR);

include "fatalErrors.php";

include "syntaxErrors.php";
