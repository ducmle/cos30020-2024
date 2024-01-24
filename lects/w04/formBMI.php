<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<!-- data process -->
<?php
  $message = "";
  if (isset($_GET["height"]) && isset($_GET["weight"])) {
    if (is_numeric($_GET["weight"]) &&
      is_numeric($_GET["height"])) {
      $bodyMass = $_GET["weight"] / ($_GET["height"] * $_GET["height"]) * 703;
      $message = "Your body mass index is $bodyMass.";
    } else {
      $message = "You must enter numeric values!";
    }
  } else {
    $message = "You must enter height and weight!";
  }
?>

 <!-- display the view output -->
 <div><?= $message ?> </div>
</body>
</html>
