<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP: strings (1)</title>
</head>
<body>
  <?php 
    $explorer = "Henry M. Stanley";
    // simple syntax
    $saying = "\"Dr. Livingstone, I presume?\" asked $explorer.";
    // single quote
    $saying2 = 'Dr. Livingstone, I presume? asked $explorer.';

    // complex syntax
    $saying3 = "Dr. Livingstone, I presume? asked $saying, {$explorer[0]}";
    $saying3 = "Dr. Livingstone, I presume? asked {$explorer}121345";

    // heredoc syntax
    $longStr = <<<EOT
    Example of string
    spanning multiple lines
    using heredoc syntax.
    {$saying}
    EOT;
  ?>
  <div><?= $saying?></div>
  <div><?= $saying2?></div>
  <div><?= $saying3?></div>
  <p></p>
  <div><?= $longStr?></div>
</body>
</html>