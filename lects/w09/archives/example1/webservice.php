<?php
header('Content-Type: text/xml');
// header('Content-Type: text/html');
?>
<?php
	error_reporting(E_ALL);	
	$url = 
  "http://www.webservicex.net/stockquote.asmx/GetQuote?symbol=";
    "http://finance.yahoo.com/q?s=";
	$qs = $_GET["symbol"];
	$url = $url.$qs;
	$doc = new DOMDocument();
  $doc->load($url); // DOMDocument::load($url);
  echo $doc->saveXML();
  // echo $doc->saveHTML();
?>