<?php
$hospitalDepts = array(
  "Anesthesia", // first element (0)
  "Molecular Biology", // second element (1)
  "Neurology", // third element (2)
  "Pediatrics"); // fourth element (3)
  // add a new element
  // offset: 3
  // length: 0
  // replacement: "Ophthalmology"

  echo "initial: ". print_r($hospitalDepts, true) ."<br/>";  

  echo "<p>Added (1): array_splice(3,0,\"Ophthalmology\")<br/>";
  array_splice($hospitalDepts, 3, 0, "Ophthalmology");
  print_r($hospitalDepts);

  echo "</p><p>Added (2): array_splice(3,0,array(\"Ophthalmology\", \"Otolaryngology\")<br/>";
  array_splice($hospitalDepts, 3, 0, 
    array("Ophthalmology", "Otolaryngology"));
  print_r($hospitalDepts);

  // delete
  // offset: 3
  // length: 1
  echo "</p><p>Deleted: array_splice(\$hospitalDepts, 3, 1)<br/>";
  array_splice($hospitalDepts, 3, 1);
  print_r($hospitalDepts);
