<?php
indexedArrayMerge();  // works best
assocArrayMerge();

function indexedArrayMerge() {
  $provinces = array("Newfoundland and Labrador",
  "Prince Edward Island", "Nova Scotia", "New Brunswick", "Quebec",
  "Ontario", "Manitoba", "Saskatchewan", "Alberta", "British Columbia");

  $territories = array("Nunavut", "Northwest Territories",
  "Yukon Territory");

  echo "<p>" ,'$provinces (initial): ', print_r($provinces, true), "</p>";
  echo "<p>" ,'$territories (initial): ', print_r($territories, true), "</p>";

  $canada = array_merge($provinces, $territories);
  //territories appended
  echo "<p>" ,'$canada (merged): ', print_r($canada, true), "</p>";
}

function assocArrayMerge() {
  $arr1 = array ("one"=>"apple", "two"=>"banana");
  $arr2 = array ("three"=>"cherry", "two"=>"grapes");

  echo "<p>" ,'$arr1 (initial): ', print_r($arr1, true), "</p>";
  echo "<p>" ,'$arr2 (initial): ', print_r($arr2, true), "</p>";

  // duplicate key "two" is overriden
  $arr3 = array_merge ($arr1, $arr2);
  echo "<p>" ,'$arr3 (merged): ', print_r($arr3, true), "</p>";
}
?>