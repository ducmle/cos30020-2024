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
  $str = "For more information, see Chapter 1232,2,5";
  $match = preg_match($pattern, $str);
  echo "<div>preg_match('$pattern', '$str'): ";
  if ($match === 1) {
    echo "<span style=color:blue>TRUE</span>";
  } else if ($match === 0) {
    echo "<span style=color:red>FALSE</span>";
  } else {
    echo "<span style=color:red>Error occurred</span>";
  }

  echo "</div>";

  // another example: make this shorter!
  // $pattern = "/^\(\d\d\) \d\d\d\d-\d\d\d\d$/";
  $pattern = "/^\(\d{2}\)\s\d{4}-\d{4}$/";
  $str = "(03) 9214-8000";
  $match = preg_match($pattern, $str);
  echo "<div>preg_match('$pattern', '$str'): ";
  if ($match === 1) {
    echo "<span style=color:blue>TRUE</span>";
  } else if ($match === 0) {
    echo "<span style=color:red>FALSE</span>";
  } else {
    echo "<span style=color:red>Error occurred</span>";
  }
  ?>
</body>

</html>