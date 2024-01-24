<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Strings (2)</title>
</head>
<body>
<?php
$firstName = "Don";
$secondName = "Dan";
?>
<p>The names "<?= $firstName?>" and
"<?= $secondName ?>" have 
<?= similar_text($firstName, $secondName)?> 
characters in common.</p>
<p>You must change 
  <?= levenshtein($firstName, $secondName) ?> character(s) to make the names 
  <?= $firstName ?> and <?= $secondName?> the same.</p>

</body>
</html>