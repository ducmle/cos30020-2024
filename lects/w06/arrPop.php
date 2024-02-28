<?php
$hospitalDepts = array(
  "Anesthesia", "Molecular Biology",
  "Neurology", "Pediatrics");

echo "initial: ". print_r($hospitalDepts, true) ."<br/>";  
//removes Pediatrics from end
array_pop($hospitalDepts); 
echo "array_pop: ". print_r($hospitalDepts, true) ."<br/>";  
// adds these to the end of array
array_push($hospitalDepts, "Psychiatry", "Pulmonary Diseases");
echo "array_push(\"Psychiatry\", \"Pulmonary Diseases\"): ". print_r($hospitalDepts, true) ."<br/>";  
