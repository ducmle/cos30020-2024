<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>PHP send mail:</h1>
  <?php
  $to = "lemduc@gmail.com";
  $subject = "This is the subject";
  $message = "This is the message.";
  $headers = "From: Duc Minh Le <dle1@swin.edu.au>";
  ?>
  <div>To: <?= $to?></div>
  <div>Subject: <?= $subject?></div>
  <div>Message: <?= $message?></div>
  <div>Headers: <?= $headers?></div>
  <p>Sending mail...</p>
  <?php $mailed = mail($to, $subject, $message, $headers); ?>
  <div>Mailed? <?= ($mailed == true) ? 'Succeeded' : 'Failed' ?></div>
</body>

</html>