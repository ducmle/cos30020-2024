<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP strings (3)</title>
</head>

<body>
  <?php
  $firstName = "internet";
  $secondName = "intranet";
  $firstNameSoundsLike = metaphone($firstName);
  $secondNameSoundsLike = metaphone($secondName);

  echo "<div>metaphone($firstName): $firstNameSoundsLike </div>";
  
  if ($firstNameSoundsLike == $secondNameSoundsLike)
    echo "<p>The names \"$firstName\", \"$secondName\" are pronounced the same.</p>";
  else
    echo "<p>The names \"$firstName\", \"$secondName\" are NOT pronounced the same.</p>";

  $soundexFirst = soundex($firstName);
  $soundexSecond = soundex($secondName);
  ?>

  <div><?= "soundex($firstName) == soundex($secondName): " . ($soundexFirst == $soundexSecond) ?></div>
</body>

</html>