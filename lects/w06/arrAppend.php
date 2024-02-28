<?php
// indexedArrayAppend();
// works best
assocArrayAppend();

function indexedArrayAppend() {
  $provinces = array("Newfoundland and Labrador",
  "Prince Edward Island", "Nova Scotia", "New Brunswick", "Quebec",
  "Ontario", "Manitoba", "Saskatchewan", "Alberta", "British Columbia");

  $territories = array("Nunavut", "Northwest Territories",
  "Yukon Territory");

  echo "<p>" ,'$provinces: ', print_r($provinces, true), "</p>";
  echo "<p>" ,'$territories: ', print_r($territories, true), "</p>";

  //territories ignored: keys 0, 1, 2 are already in $provinces
  $canada = $provinces + $territories; 
  echo "<p>" ,'$canada (combined): ', print_r($canada, true), "</p>";
}

function assocArrayAppend() {
  $gamePieces["Dancer"] = "Daryl";
  $gamePieces["Fat Man"] = "Dennis";
  $gamePieces["Assassin"] = "Jennifer";

  echo "<p>" ,'$gamePieces (initial): ', print_r($gamePieces, true), "</p>";

  $games["Fat Man"] = "Darel";  // same key: ignored
  $games["Nutcracker"] = "Alice"; // appended

  echo "<p>" ,'$games (to add): ', print_r($games, true), "</p>";

  $gamePieces += $games;
  echo "<p>" ,'$gamePieces (after): ', print_r($gamePieces, true), "</p>";

}