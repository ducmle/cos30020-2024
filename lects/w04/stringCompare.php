<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String comparison</title>
</head>
<body>
  <?php
  $str1 = "LE MINH DUC";
  $str2 = "Le Ha Anh";
  $result1 = strcmp($str1, $str2);
  $result2 = strcasecmp($str1, $str2);
  ?>

  <div><?= "strcmp($str1, $str2) = $result1" ?></div>
  <div><?= "strcasecmp($str1, $str2) = $result2" ?></div>
</body>
</html>