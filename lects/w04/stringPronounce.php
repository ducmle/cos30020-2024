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
  $secondName = "nintranet";
  $firstNameSoundsLike = metaphone($firstName);
  $secondNameSoundsLike = metaphone($secondName);

  echo "<div>metaphone($firstName): $firstNameSoundsLike </div>";
  echo "<div>metaphone($secondName): $secondNameSoundsLike </div>";
  
  if ($firstNameSoundsLike == $secondNameSoundsLike)
    echo "<div>\"$firstName\", \"$secondName\" are pronounced the same.</div>";
  else
    echo "<div>\"$firstName\", \"$secondName\" are NOT pronounced the same.</div>";

  echo "<p></p>";

  $soundexFirst = soundex($firstName);
  $soundexSecond = soundex($secondName);

  echo "<div>soundex($firstName): $soundexFirst </div>";
  echo "<div>soundex($secondName): $soundexSecond </div>";
  echo "<div>soundex($firstName) == soundex($secondName): " . ($soundexFirst == $soundexSecond) . "</div>"
  ?>


</body>

</html>