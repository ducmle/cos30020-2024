<?php
$topGolfers = array(
  "Ernie Els",
  "Phil Mickelson",
  "Retief Goosen",
  "Padraig Harrington",
  "David Toms",
  "Sergio Garcia",
  "Adam Scott",
  "Stewart Cink");
  echo "initial: ". print_r($topGolfers, true) ."<br/>";
  array_shift($topGolfers);
  echo "shifted: ". print_r($topGolfers, true) ."<br/>";
  array_unshift($topGolfers, "Tiger Woods", "Vijay Singh");
  echo "unshifted (\"Tiger Woods\", \"Vijay Singh\"): ". print_r($topGolfers, true) ."<br/>";
?>