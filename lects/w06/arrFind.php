<?php
  $hospitalDepts = array(
    "Anesthesia", // first element (0)
    "Molecular Biology", // second element (1)
    "Neurology", // third element (2)
    "Pediatrics"
  ); // fourth element (3)

  echo "\$hospitalDepts: ". print_r($hospitalDepts, true) ."<br/>";  
  
  $gamePieces["Dancer"] = "Daryl";
  $gamePieces["Fat Man"] = "Dennis";
  $gamePieces["Assassin"] = "Jennifer";

  echo "\$gamePieces: ". print_r($gamePieces, true) ."<br/>";  

inArray();
arraySearch();
arrayKeyExists();

function inArray() {
  global $hospitalDepts;
  $term = "Neurology";
  if (in_array($term, $hospitalDepts))
    echo "<p>The hospital has a $term department.</p>";
  else
    echo "<p>The hospital has NO $term department.</p>";
}

function arraySearch() {
  global $hospitalDepts, $gamePieces;
  $needle = "Neurology";
  $result = array_search($needle, $hospitalDepts);
  if ($result === false) {
    echo "<p>The hospital has NO $needle department.</p>";
  } else {
    echo "<p>The hospital has a $needle department (at key: $result).</p>";
  }

  $needle = "Dennis";
  $result = array_search($needle, $gamePieces);
  if ($result) {
    echo "<p>gamePieces[",  $result, "] is $needle.</p>";
  } else {
    echo "<p>No such game piece: $needle.</p>";
  }
}

function arrayKeyExists() {
  global $gamePieces;
  $key = "Fat Man2";
  if (array_key_exists($key, $gamePieces)) {
    echo "<p>{$gamePieces[$key]} is already 'Fat Man'.</p>";
  } else {
    $gamePieces[$key] = "Don";
    echo "<p>{$gamePieces[$key]} is now '$key'.</p>";
    echo "\$gamePieces: ". print_r($gamePieces, true) ."<br/>";  
  }
}
