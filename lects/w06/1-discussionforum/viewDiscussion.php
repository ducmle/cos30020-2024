<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    table, td, th {
      border: 1px solid;
      border-collapse: collapse;
      padding: 5px;
    }
  </style>
  <title>Discussion forum </title>
</head>
<body>
<h1>Discussions</h1>
<!-- front end -->
<table width="50%">
  <!-- back end: view messages -->
  <?= viewMessages() ?>
</table>
</body>
</html>

<?php
  // back end
  function viewMessages() {
    // uses BLOCK string to ease viewing
    // $msgTemp = <<<BLOCK
    // <b>Topic:</b> {{topic}}<br/>
    // <b>Name:</b> {{name}}<br/>
    // <b>Message:</b> {{message}}<br/>
    // BLOCK;
    
    $msgRowTemp = <<<BLOCK
      <!-- message row -->
      <tr>
        <td align="center">{{index}}</td>
        <td>
        <b>Topic:</b> {{topic}}<br/>
        <b>Name:</b> {{name}}<br/>
        <b>Message:</b> {{message}}<br/>
        </td>
      </tr>
      BLOCK;
    $msgs = "";
    // open messages.txt file for reading
    $file = "data" . DIRECTORY_SEPARATOR . "messages.txt";
    if (!file_exists($file) || filesize($file) == 0) {
      $msgs = "<tr><td>There are no messages posted.</td><tr>";
    } else {
      // read each message entry and "render" it using $msgTemp
      $messageArray = file($file);
      for ($i = 0; $i < count($messageArray); $i++) {
        $curMessage = explode("~", $messageArray[$i]);
        $msgs = $msgs . str_replace(
            array("{{index}}",
              "{{name}}",
              "{{topic}}",
              "{{message}}"),
            array(($i + 1), 
              stripslashes($curMessage[0]), 
              stripslashes($curMessage[1]),
              stripslashes($curMessage[2]))
            , $msgRowTemp);
      }
    }

    return $msgs;
  }
