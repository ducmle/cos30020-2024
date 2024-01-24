<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String concatenation</title>
</head>
<body>
  <?php
    $location1 = "Paris";
    $location2 = "France";
    // we already know this: 
    $destination = "<p> \t $location1 is in \t $location2 .</p>";

    // why this? (same result) - when location1 & 2 come from other parts of the program
    // $destination = "<p> " . $location1 . " is in " . $location2 . ".</p>";

    echo $destination;
  ?>
</body>
</html>