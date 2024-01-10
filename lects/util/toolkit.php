<?php
  // return the absolute path on the server to the data directory
  // this directory is not located in the web site's directory 
  // so that it is not viewable on the browser
  function getDataDirPath() {
    $docRoot = $_SERVER["DOCUMENT_ROOT"];
    // get the parent dir of docRoot
    $defaultDataDir = dirname($docRoot) . DIRECTORY_SEPARATOR . "data";
    return $defaultDataDir;
  }
?>