<?php
require_once('JSON.php'); 
$myJSON = new Services_JSON();

$av1 = array(1, 3, array(5, 7), 'x');
$response = $myJSON-> encode($av1);
echo ($response);			   
?>
