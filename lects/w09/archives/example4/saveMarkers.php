<?php
header('Content-Type: text/xml');
?>

<?php

function createXML($doc){
	$markers = $doc->createElement('markers');
	$markers  = $doc->appendChild($markers);
}

	error_reporting(E_ALL);	
//should validate with is_set 
	$url = '../../data/data.xml';
	//chmod($url, 02777);
	$lat  = $_GET['lat'];
	$lng  = $_GET['lng'];
	$address  = $_GET['address'];
	
	$doc = new DomDocument();
	
	if (!file_exists($url)){
		createXML($doc);
	}
	else {
		$doc->preserveWhiteSpace = FALSE; 
		$doc->load($url);  
	}
	$markers = $doc->getElementsByTagName('markers')->item(0);
	$marker = $doc->createElement('marker');
	$marker = $markers->appendChild($marker);   
	$marker->setAttribute("lat", $lat);
	$marker->setAttribute("lng", $lng);
	$marker->setAttribute("address", $address);

	$doc->formatOutput = true;
	$strConfirm = "Marker added for ".$address;
	$doc->save($url);  
	ECHO ($strConfirm);

?>