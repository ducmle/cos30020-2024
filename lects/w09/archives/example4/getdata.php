<?php
	
	$url = '../../data/data.xml';
	$doc = new DomDocument();
      $doc->load($url);
      ECHO ($doc->saveXML());

?>





