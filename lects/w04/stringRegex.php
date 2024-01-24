<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $pattern = "/(chapter \d+(\.\d)*)/i";
  $str = "For more information, see Chapter 1232,2,5.";
  $match = preg_match($pattern, $str);
  if ($match === 1) {
    echo "A match was found.";
  } else if ($match === 0) {
    echo "A match was not found.";
  } else {
    echo "An error occured";
  }

  // another example: make this shorter!
  // $pattern = "/^\(\d\d\) \d\d\d\d-\d\d\d\d$/";
  $pattern = "/^\(\d{2}\) \d{4}-\d{4}$/"
  ?>
</body>

</html>