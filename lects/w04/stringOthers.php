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
  $new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
  echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
  ?>
</body>
</html>